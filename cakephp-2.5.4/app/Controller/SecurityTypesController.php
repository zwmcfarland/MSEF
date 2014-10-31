<?php 
	class SecurityTypesController extends AppController {
		var $name = 'SecurityTypes';
	    public $helpers = array('Html', 'Form');
		public $components = array('Session');
	
	    public function index() {
	        $this->set('securityTypes', $this->SecurityType->find('all'));
	    }
	
	    public function view($Id = null) {
	        if (!$Id) {
	            throw new NotFoundException(__('Invalid post'));
	        }
	
	        $securityType = $this->SecurityType->findById($Id);
	        if (!$securityType) {
	            throw new NotFoundException(__('Invalid post'));
	        }
	        $this->set('SecurityType', $securityType);
	    }
	
	    public function add() {
	        if ($this->request->is('post')) {
	            $this->SecurityType->create();
	            if ($this->SecurityType->save($this->request->data)) {
	                $this->Session->setFlash(__('New Security Type has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your Security Type.'));
	        }
	    }
	    
	    public function edit($Id = null) {
		    if (!$Id) {
		        throw new NotFoundException(__('Invalid Security Type'));
		    }
		
		    $securityType = $this->SecurityType->findById($Id);
		    if (!$securityType) {
		        throw new NotFoundException(__('Invalid Security Type'));
		    }
		
		    if ($this->request->is(array('post', 'put'))) {
		        $this->SecurityType->Id = $Id;
		        if ($this->SecurityType->save($this->request->data)) {
		            $this->Session->setFlash(__('This Security Type has been updated.'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Session->setFlash(__('Unable to update your Security Type.'));
		    }
		
		    if (!$this->request->data) {
		        $this->request->data = $securityType;
		    }
		}
		
		public function delete($Id) {
		    if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }
	
		    if ($this->SecurityType->delete($Id)) {
		        $this->Session->setFlash(
		            __('The Security Type with id: %s has been deleted.', h($Id))
		        );
		        return $this->redirect(array('action' => 'index'));
		    }
		}
	}
?>