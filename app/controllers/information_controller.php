<?php
class InformationController extends AppController {

	var $name = 'Information';

	function index() {
		$this->Information->recursive = 0;
		$this->set('information', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid information', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('information', $this->Information->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Information->create();
			if ($this->Information->save($this->data)) {
				$this->Session->setFlash(__('The information has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The information could not be saved. Please, try again.', true));
			}
		}
		$districts = $this->Information->District->find('list');
		$users = $this->Information->User->find('list');
		$informationCategories = $this->Information->InformationCategory->find('list');
		$this->set(compact('districts', 'users', 'informationCategories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid information', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Information->save($this->data)) {
				$this->Session->setFlash(__('The information has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The information could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Information->read(null, $id);
		}
		$districts = $this->Information->District->find('list');
		$users = $this->Information->User->find('list');
		$informationCategories = $this->Information->InformationCategory->find('list');
		$this->set(compact('districts', 'users', 'informationCategories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for information', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Information->delete($id)) {
			$this->Session->setFlash(__('Information deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Information was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
