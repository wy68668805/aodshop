<?php
class ProductCatsController extends AppController {

	var $name = 'ProductCats';

	function index() {
		$this->ProductCat->recursive = 0;
		$this->set('productCats', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product cat', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productCat', $this->ProductCat->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this -> data['ProductCat']['product_number'] = 0;
			$this -> data['ProductCat']['info_number'] = 0;
			$this->ProductCat->create();
			if ($this->ProductCat->save($this->data)) {
				$this->Session->setFlash(__('The product cat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product cat could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product cat', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProductCat->save($this->data)) {
				$this->Session->setFlash(__('The product cat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product cat could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductCat->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product cat', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProductCat->delete($id)) {
			$this->Session->setFlash(__('Product cat deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product cat was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
