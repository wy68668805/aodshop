<?php
class InformationCategoriesController extends AppController {

	var $name = 'InformationCategories';

	function index() {
		$this->InformationCategory->recursive = 0;
		$this->set('informationCategories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid information category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('informationCategory', $this->InformationCategory->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->InformationCategory->create();
			if ($this->InformationCategory->save($this->data)) {
				$this->Session->setFlash(__('The information category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The information category could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid information category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->InformationCategory->save($this->data)) {
				$this->Session->setFlash(__('The information category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The information category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->InformationCategory->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for information category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->InformationCategory->delete($id)) {
			$this->Session->setFlash(__('Information category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Information category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
