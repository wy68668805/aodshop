<?php
class ProductPurchasesController extends AppController {

	var $name = 'ProductPurchases';

	function index() {
		$this->ProductPurchase->recursive = 0;
		$this->set('productPurchases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productPurchase', $this->ProductPurchase->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProductPurchase->create();
			if ($this->ProductPurchase->save($this->data)) {
				$this->Session->setFlash(__('The product purchase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product purchase could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProductPurchase->User->find('list');
		$districts = $this->ProductPurchase->District->find('list');
		$productCats = $this->ProductPurchase->ProductCat->find('list');
		$this->set(compact('users', 'districts', 'productCats'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product purchase', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProductPurchase->save($this->data)) {
				$this->Session->setFlash(__('The product purchase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product purchase could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductPurchase->read(null, $id);
		}
		$users = $this->ProductPurchase->User->find('list');
		$districts = $this->ProductPurchase->District->find('list');
		$productCats = $this->ProductPurchase->ProductCat->find('list');
		$this->set(compact('users', 'districts', 'productCats'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product purchase', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProductPurchase->delete($id)) {
			$this->Session->setFlash(__('Product purchase deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product purchase was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
