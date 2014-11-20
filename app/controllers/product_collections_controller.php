<?php
class ProductCollectionsController extends AppController {

	var $name = 'ProductCollections';

	function index() {
		$this->ProductCollection->recursive = 0;
		$this->set('productCollections', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product collection', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productCollection', $this->ProductCollection->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProductCollection->create();
			if ($this->ProductCollection->save($this->data)) {
				$this->Session->setFlash(__('The product collection has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product collection could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProductCollection->User->find('list');
		$products = $this->ProductCollection->Product->find('list');
		$this->set(compact('users', 'products'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product collection', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProductCollection->save($this->data)) {
				$this->Session->setFlash(__('The product collection has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product collection could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductCollection->read(null, $id);
		}
		$users = $this->ProductCollection->User->find('list');
		$products = $this->ProductCollection->Product->find('list');
		$this->set(compact('users', 'products'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product collection', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProductCollection->delete($id)) {
			$this->Session->setFlash(__('Product collection deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product collection was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
