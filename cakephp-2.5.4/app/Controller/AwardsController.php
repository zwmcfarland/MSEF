<?php 
	class AwardsController extends AppController {
	    public $helpers = array('Html', 'Form');
		public $components = array('Session');
	
	    public function index() {
	        $this->set('events', $this->Award->find('all'));
	    }
	
	    public function view($Id = null) {
	        if (!$Id) {
	            throw new NotFoundException(__('Invalid award'));
	        }
	
	        $award = $this->Award->findById($Id);
	        if (!$award) {
	            throw new NotFoundException(__('Invalid award'));
	        }
	        $this->set('award', $award);
	    }
	
	    public function add() {
	        if ($this->request->is('post')) {
	            $this->Award->create();
	            if ($this->Award->save($this->request->data)) {
	                $this->Session->setFlash(__('New award has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your award.'));
	        }
	    }
	    
	    public function edit($Id = null) {
		    if (!$Id) {
		        throw new NotFoundException(__('Invalid award'));
		    }
		
		    $award = $this->Award->findById($Id);
		    if (!$award) {
		        throw new NotFoundException(__('Invalid award'));
		    }
		
		    if ($this->request->is(array('post', 'put'))) {
		        $this->Award->Id = $Id;
		        if ($this->Award->save($this->request->data)) {
		            $this->Session->setFlash(__('This award has been updated.'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Session->setFlash(__('Unable to update your award.'));
		    }
		
		    if (!$this->request->data) {
		        $this->request->data = $award;
		    }
		}
		
		public function delete($Id) {
		    if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }
	
		    if ($this->Award->delete($Id)) {
		        $this->Session->setFlash(
		            __('The award with id: %s has been deleted.', h($Id))
		        );
		        return $this->redirect(array('action' => 'index'));
		    }
		}
	}
?>