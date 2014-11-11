<?php 
    class UsersController extends AppController {
    	var $name = 'Users';
        public $helpers = array('Html', 'Form');
        public $components = array('Session');
    
        public function index() {
            $this->set('users', $this->User->find('all'));
        }

        public function view($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid post'));
            }
    
            $user = $this->User->findById($Id);
            if (!$user) {
                throw new NotFoundException(__('Invalid post'));
            }
            $this->set('user', $user);
        }

        public function add() {
            if ($this->request->is('post')) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('New User has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your School.'));
            }
            $schools = $this->User->School->find('list', array('fields' => array('School.Name')));
            $this->set('schools', $schools);
            $securityTypes = $this->User->SecurityType->find('list', array('fields' => array('SecurityType.Name')));
            $this->set('securityTypes', $securityTypes);
        }

        public function edit($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid User'));
            }
        
            $user = $this->User->findById($Id);
            if (!$user) {
                throw new NotFoundException(__('Invalid User'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->User->id = $Id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('This user has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update your School.'));
            }
        
            if (!$this->request->data) {
                $this->request->data = $user;
            }
            $schools = $this->User->School->find('list', array('fields' => array('School.Name')));
            $this->set('schools', $schools);
            $securityTypes = $this->User->SecurityType->find('list', array('fields' => array('SecurityType.Name')));
            $this->set('securityTypes', $securityTypes);
        }

        public function delete($Id) {
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
    
            if ($this->User->delete($Id)) {
                $this->Session->setFlash(
                    __('The user with id: %s has been deleted.', h($Id))
                );
                return $this->redirect(array('action' => 'index'));
            }
        }
        
        public function beforeFilter() {
            parent::beforeFilter();
            // Allow users to register and logout.
            $this->Auth->allow('add', 'logout', 'index');
        }
		
		public function isAuthorized($user) {
		
		    if (in_array($this->action, array('edit'))) {
		        $userId = (int) $this->request->params['pass'][0];
		        if ($this->User->isCurrent($userId, $user['Id'])) {
		            return true;
		        }
		    }
		
		    return parent::isAuthorized($user);
		}
        
        public function login() {
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirect());
                }
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
        
        public function logout() {
            return $this->redirect($this->Auth->logout());
        }
    }
?>
