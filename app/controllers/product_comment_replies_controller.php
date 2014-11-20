<?php
class ProductCommentRepliesController extends AppController {

	var $name = 'ProductCommentReplies';

	function index() {
		$this->ProductCommentReply->recursive = 0;
		$this->set('productCommentReplies', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product comment reply', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productCommentReply', $this->ProductCommentReply->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProductCommentReply->create();
			if ($this->ProductCommentReply->save($this->data)) {
				$this->Session->setFlash(__('The product comment reply has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product comment reply could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProductCommentReply->User->find('list');
		$productPurchases = $this->ProductCommentReply->ProductPurchase->find('list');
		$this->set(compact('users', 'productPurchases'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product comment reply', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProductCommentReply->save($this->data)) {
				$this->Session->setFlash(__('The product comment reply has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product comment reply could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductCommentReply->read(null, $id);
		}
		$users = $this->ProductCommentReply->User->find('list');
		$productPurchases = $this->ProductCommentReply->ProductPurchase->find('list');
		$this->set(compact('users', 'productPurchases'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product comment reply', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProductCommentReply->delete($id)) {
			$this->Session->setFlash(__('Product comment reply deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product comment reply was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
