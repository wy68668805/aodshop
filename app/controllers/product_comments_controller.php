<?php
class ProductCommentsController extends AppController {

	var $name = 'ProductComments';

	function index() {
		$this->ProductComment->recursive = 0;
		$this->set('productComments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product comment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productComment', $this->ProductComment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProductComment->create();
			if ($this->ProductComment->save($this->data)) {
				$this->Session->setFlash(__('The product comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product comment could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProductComment->User->find('list');
		$products = $this->ProductComment->Product->find('list');
		$this->set(compact('users', 'products'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product comment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProductComment->save($this->data)) {
				$this->Session->setFlash(__('The product comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product comment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductComment->read(null, $id);
		}
		$users = $this->ProductComment->User->find('list');
		$products = $this->ProductComment->Product->find('list');
		$this->set(compact('users', 'products'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product comment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProductComment->delete($id)) {
			$this->Session->setFlash(__('Product comment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product comment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
