<?php
class ShopCollectionsController extends AppController {

	var $name = 'ShopCollections';

	function index() {
		$this->ShopCollection->recursive = 0;
		$this->set('shopCollections', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid shop collection', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('shopCollection', $this->ShopCollection->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ShopCollection->create();
			if ($this->ShopCollection->save($this->data)) {
				$this->Session->setFlash(__('The shop collection has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shop collection could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ShopCollection->User->find('list');
		$shops = $this->ShopCollection->Shop->find('list');
		$this->set(compact('users', 'shops'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid shop collection', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ShopCollection->save($this->data)) {
				$this->Session->setFlash(__('The shop collection has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shop collection could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ShopCollection->read(null, $id);
		}
		$users = $this->ShopCollection->User->find('list');
		$shops = $this->ShopCollection->Shop->find('list');
		$this->set(compact('users', 'shops'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for shop collection', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ShopCollection->delete($id)) {
			$this->Session->setFlash(__('Shop collection deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Shop collection was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
