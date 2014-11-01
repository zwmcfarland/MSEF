<?php 
	class CategoriesController extends AppController {
	    public $helpers = array('Html', 'Form');
		public $components = array('Session');
	
	    public function index() {
	        $this->set('categories', $this->Category->find('all'));
	    }
	
	    public function view($Id = null) {
	        if (!$Id) {
	            throw new NotFoundException(__('Invalid category'));
	        }
	
	        $category = $this->Category->findById($Id);
	        if (!$category) {
	            throw new NotFoundException(__('Invalid category'));
	        }
	        $this->set('category', $category);
	    }
	
	    public function add() {
	        if ($this->request->is('post')) {
	            $this->Category->create();
	            if ($this->Category->save($this->request->data)) {
	                $this->Session->setFlash(__('New category has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your category.'));
	        }
	    }
	    
	    public function edit($Id = null) {
		    if (!$Id) {
		        throw new NotFoundException(__('Invalid category'));
		    }
		
		    $category = $this->Category->findById($Id);
		    if (!$category) {
		        throw new NotFoundException(__('Invalid category'));
		    }
		
		    if ($this->request->is(array('post', 'put'))) {
		        $this->Category->id = $Id;
		        if ($this->Category->save($this->request->data)) {
		            $this->Session->setFlash(__('This category has been updated.'));
		            return $this->redirect(array('action' => 'index'));
		        }
		        $this->Session->setFlash(__('Unable to update your category.'));
		    }
		
		    if (!$this->request->data) {
		        $this->request->data = $category;
		    }
		}
		
		public function delete($Id) {
		    if ($this->request->is('get')) {
		        throw new MethodNotAllowedException();
		    }
	
		    if ($this->Category->delete($Id)) {
		        $this->Session->setFlash(
		            __('The category with id: %s has been deleted.', h($Id))
		        );
		        return $this->redirect(array('action' => 'index'));
		    }
		}
	}
?>
