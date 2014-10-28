<?php
	
	class StatusesController extends AppController
	{
		public $helpers = array('Html', 'Form');
		public $components = array('Session');
		
		public function index(){
			$this->set('statuses', $this->Status->find('all'));
		}
		
		public function view($Id = null) {

		if (!$Id) {

	            throw new NotFoundException(__('Invalid post'));
	        }
			
			$status = $this->Status->findById($Id);
			
			if (!$status) {
				throw new NotFoundException(__('Invalid post'));
			}
			
			$this->set('status',$status);		
		}
		
		public function add() {
			 if ($this->request->is('post')) {
					$this->Status->create();
					if ($this->Status->save($this->request->data)) {
						$this->Session->setFlash(__('New Status has been saved.'));
						return $this->redirect(array('action' => 'index'));
					}
					$this->Session->setFlash(__('Unable to add your Status'));
				}
		}
		public function edit($Id = null){
			if (!$Id) {
		        throw new NotFoundException(__('Invalid Status'));
		    }
		
		    $status = $this->Status->findById($Id);
		    if (!$status) {
		        throw new NotFoundException(__('Invalid Status'));
		    }
		
		    if ($this->request->is(array('post', 'put'))) {
		        $this->Status->Id = $Id;
		        if ($this->Status->save($this->request->data)) {
		            $this->Session->setFlash(__('This Status has been updated.'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Session->setFlash(__('Unable to update your Status'));
		    }
		
		    if (!$this->request->data) {
		        $this->request->data = $status;
		    }
		}
		public function delete($Id){
			if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }
	
		    if ($this->Status->delete($Id)) {
		        $this->Session->setFlash(
		            __('The Status with id: %s has been deleted.', h($Id))
		        );
		        return $this->redirect(array('action' => 'index'));
		    }
		}
			

	}
?>