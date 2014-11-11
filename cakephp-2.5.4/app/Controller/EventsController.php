<?php 
    class EventsController extends AppController {
        public $helpers = array('Html', 'Form');
        public $components = array('Session');
    
        public function index() {
            $this->set('events', $this->Event->find('all'));
        }
    
        public function view($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid event'));
            }
    
            $event = $this->Event->findById($Id);
            if (!$event) {
                throw new NotFoundException(__('Invalid event'));
            }
            $this->set('event', $event);
        }
    
        public function add() {
            if ($this->request->is('post')) {
                $this->Event->create();
                if ($this->Event->save($this->request->data)) {
                    $this->Session->setFlash(__('New event has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your event.'));
            }
        }
        
        public function edit($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid event'));
            }
        
            $event = $this->Event->findById($Id);
            if (!$event) {
                throw new NotFoundException(__('Invalid event'));
            }
        
            if ($this->request->is(array('post', 'put'))) {
                $this->Event->id = $Id;
                if ($this->Event->save($this->request->data)) {
                    $this->Session->setFlash(__('This event has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update your event.'));
            }
        
            if (!$this->request->data) {
                $this->request->data = $event;
            }
        }
        
        public function delete($Id) {
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
    
            if ($this->Event->delete($Id)) {
                $this->Session->setFlash(
                    __('The event with id: %s has been deleted.', h($Id))
                );
                return $this->redirect(array('action' => 'index'));
            }
        }

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
    }
?>
