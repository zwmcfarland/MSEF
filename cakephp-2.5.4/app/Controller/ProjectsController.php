<?php 
    class ProjectsController extends AppController {
    	var $name = 'Projects';
        public $helpers = array('Html', 'Form');
        public $components = array('Session');

        public function index() {
            $this->set('projects', $this->Project->find('all'));
        }

        public function view($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid project'));
            }

            $project = $this->Project->findById($Id);
            if (!$project) {
                throw new NotFoundException(__('Invalid project'));
            }
            $this->set('project', $project);
        }

        public function add() {
            if ($this->request->is('post')) {
                $this->Project->create();
                if ($this->Project->save($this->request->data)) {
                    $this->Session->setFlash(__('New Project has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to add your project.'));
            }
            $statuses = $this->Project->Status->find('list', array('fields' => array('Status.Name')));
            $this->set('statuses', $statuses);
        }

        public function edit($Id = null) {
            if (!$Id) {
                throw new NotFoundException(__('Invalid project'));
            }

            $project = $this->Project->findById($Id);
            if (!$project) {
                throw new NotFoundException(__('Invalid project'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Project->id = $Id;
                if ($this->Project->save($this->request->data)) {
                    $this->Session->setFlash(__('This project has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Unable to update your project.'));
            }

            if (!$this->request->data) {
                $this->request->data = $project;
            }
            $statuses = $this->Project->Status->find('list', array('fields' => array('Status.Name')));
            $this->set('statuses', $statuses);
        }

        public function delete($Id) {
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }

            if ($this->Project->delete($Id)) {
                $this->Session->setFlash(
                    __('The project with id: %s has been deleted.', h($Id))
                );
                return $this->redirect(array('action' => 'index'));
            }
        }
    }
?>
