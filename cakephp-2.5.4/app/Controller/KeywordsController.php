<?php 
    class KeywordsController extends AppController {
        var $name = 'Keywords';
        public $helpers = array('Html', 'Form');
        public $components = array('Session');

        public function beforeFilter() {
            parent::beforeFilter();
            if($this->Auth->user('SecurityType') != 'Staff') {
                $this->Auth->allow(array('view', 'index', 'add', 'edit'));
            }
            else {
                $this->Auth->deny(array('view', 'index','moveup'));
                $this->controller->redirect('/');
            }
        }

        public function index() {
            $this->set('keywords', $this->Keyword->find('all'));
        }

        public function view($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid keyword'));
            }
    
            $keyword = $this->Keyword->findById($Id);
            if (!$keyword) {
                throw new NotFoundException(__('Invalid keyword'));
            }
            $this->set('keyword', $keyword);
        }

        public function add() {
            if ($this->request->is('post')) {
                $this->Keyword->create();
                if ($this->Keyword->save($this->request->data)) {
                    $this->Session->setFlash(__('New keyword has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your keyword.'));
            }
        }

        public function edit($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid keyword'));
            }

            $keyword = $this->Keyword->findById($Id);
            if (!$keyword) {
                throw new NotFoundException(__('Invalid keyword'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Keyword->id = $Id;
                if ($this->Keyword->save($this->request->data)) {
                    $this->Session->setFlash(__('This keyword has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update your keyword.'));
            }

            if (!$this->request->data) {
                $this->request->data = $keyword;
            }
        }

        public function delete($Id) {
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }

            if ($this->Keyword->delete($Id)) {
                $this->Session->setFlash(
                    __('The keyword with id: %s has been deleted.', h($Id))
                );
                return $this->redirect(array('action' => 'index'));
            }
        }
    }
?>
