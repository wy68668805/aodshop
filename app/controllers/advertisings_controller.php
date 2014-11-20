<?php
class AdvertisingsController extends AppController {

	var $name = 'Advertisings';

	function index() {
		$this->Advertising->recursive = 0;
		$this->set('advertisings', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid advertising', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('advertising', $this->Advertising->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Advertising->create();
			if ($this->Advertising->save($this->data)) {
				$this->Session->setFlash(__('The advertising has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertising could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Advertising->User->find('list');
		$districts = $this->Advertising->District->find('list');
		$this->set(compact('users', 'districts'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid advertising', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Advertising->save($this->data)) {
				$this->Session->setFlash(__('The advertising has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The advertising could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Advertising->read(null, $id);
		}
		$users = $this->Advertising->User->find('list');
		$districts = $this->Advertising->District->find('list');
		$this->set(compact('users', 'districts'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for advertising', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Advertising->delete($id)) {
			$this->Session->setFlash(__('Advertising deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Advertising was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
