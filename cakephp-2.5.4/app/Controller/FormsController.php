<?php 
    class FormsController extends AppController {
        public $helpers = array('Html', 'Form');
        public $components = array('Session');
    
        public function index() {
            $this->set('forms', $this->Form->find('all'));
        }
    
        public function view($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid form'));
            }
    
            $form = $this->Form->findById($Id);
            if (!$form) {
                throw new NotFoundException(__('Invalid form'));
            }
            $this->set('form', $form);
        }
    
        public function add() {
            if ($this->request->is('post')) {
                $this->Form->create();
                if ($this->Form->save($this->request->data)) {
                    $this->Session->setFlash(__('New form has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your form.'));
            }
        }

        public function edit($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid form'));
            }

            $form = $this->Form->findById($Id);
            if (!$form) {
                throw new NotFoundException(__('Invalid form'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Form->id = $Id;
                if ($this->Form->save($this->request->data)) {
                    $this->Session->setFlash(__('This form has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update your form.'));
            }
        
            if (!$this->request->data) {
                $this->request->data = $form;
            }
        }

        public function delete($Id) {
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
    
            if ($this->Form->delete($Id)) {
                $this->Session->setFlash(
                    __('The form with id: %s has been deleted.', h($Id))
                );
                return $this->redirect(array('action' => 'index'));
            }
        }

        /* Security */
        public function beforeFilter() {
            parent::beforeFilter();
            // Allow users to register and logout.
            $this->Auth->allow('index','view');
        }

        public function isAuthorized($user) {
            if (in_array($this->action, array('edit', 'add', 'delete'))) {
                return parent::isAuthorized($user);
            }
            return true;
        }
        /* END: Security */
    }
?>
