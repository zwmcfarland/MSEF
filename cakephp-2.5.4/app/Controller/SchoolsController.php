<?php 
	class SchoolsController extends AppController {
		var $name = 'Schools';
	    public $helpers = array('Html', 'Form');
		public $components = array('Session');
	
	    public function index() {
	        $this->set('schools', $this->School->find('all'));
	    }
	
	    public function view($Id = null) {
	        if (!$Id) {
	            throw new NotFoundException(__('Invalid post'));
	        }
	
	        $school = $this->School->findById($Id);
	        if (!$school) {
	            throw new NotFoundException(__('Invalid post'));
	        }
	        $this->set('school', $school);
	    }
	
	    public function add() {
	        if ($this->request->is('post')) {
	            $this->School->create();
	            if ($this->School->save($this->request->data)) {
	                $this->Session->setFlash(__('New School has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your School.'));
	        }
	    }
	    
	    public function edit($Id = null) {
		    if (!$Id) {
		        throw new NotFoundException(__('Invalid School'));
		    }
		
		    $school = $this->School->findById($Id);
		    if (!$school) {
		        throw new NotFoundException(__('Invalid School'));
		    }
		
		    if ($this->request->is(array('post', 'put'))) {
		        $this->School->Id = $Id;
		        if ($this->School->save($this->request->data)) {
		            $this->Session->setFlash(__('This School has been updated.'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Session->setFlash(__('Unable to update your School.'));
		    }
		
		    if (!$this->request->data) {
		        $this->request->data = $school;
		    }
		}
		
		public function delete($Id) {
		    if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }
	
		    if ($this->School->delete($Id)) {
		        $this->Session->setFlash(
		            __('The School with id: %s has been deleted.', h($Id))
		        );
		        return $this->redirect(array('action' => 'index'));
		    }
		}
	}
?>