<?php
class UserCatsController extends AppController {

	var $name = 'UserCats';

	function index() {
		$this->UserCat->recursive = 0;
		$this->set('userCats', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user cat', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('userCat', $this->UserCat->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UserCat->create();
			if ($this->UserCat->save($this->data)) {
				$this->Session->setFlash(__('The user cat has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user cat could not be saved. Please, try again.', true));
			}
		}
	}

	// function edit($id = null) {
		// if (!$id && empty($this->data)) {
			// $this->Session->setFlash(__('Invalid user cat', true));
			// $this->redirect(array('action' => 'index'));
		// }
		// if (!empty($this->data)) {
			// if ($this->UserCat->save($this->data)) {
				// $this->Session->setFlash(__('The user cat has been saved', true));
				// $this->redirect(array('action' => 'index'));
			// } else {
				// $this->Session->setFlash(__('The user cat could not be saved. Please, try again.', true));
			// }
		// }
		// if (empty($this->data)) {
			// $this->data = $this->UserCat->read(null, $id);
		// }
	// }
// 
	// function delete($id = null) {
		// if (!$id) {
			// $this->Session->setFlash(__('Invalid id for user cat', true));
			// $this->redirect(array('action'=>'index'));
		// }
		// if ($this->UserCat->delete($id)) {
			// $this->Session->setFlash(__('User cat deleted', true));
			// $this->redirect(array('action'=>'index'));
		// }
		// $this->Session->setFlash(__('User cat was not deleted', true));
		// $this->redirect(array('action' => 'index'));
	// }
}
