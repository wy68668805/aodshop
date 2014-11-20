<?php
class ProductsController extends AppController {

	var $name = 'Products';
	var $components = array('Filehandle');

	function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		$districts = $this->Product->District->find('list');
		$productCats = $this->Product->ProductCat->find('list');
		$users = $this->Product->User->find('list');
		$this->set(compact('districts', 'productCats', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$districts = $this->Product->District->find('list');
		$productCats = $this->Product->ProductCat->find('list');
		$users = $this->Product->User->find('list');
		$this->set(compact('districts', 'productCats', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('Product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * @name 商家浏览自己发布的产品
	 */
	function bussinessListProduct(){
		$this->Product->recursive = 0;
		$products = $this->paginate(array('Product.user_id' => $_SESSION['Auth']['User']['id']));
		$this->set('products', $products);
	}
	
	
	/**
	 * @name 商家发布产品
	 */
	function bussinessAddProduct(){
		$this -> loadModel('User');
		$this -> loadModel('Level');
		$userid = $_SESSION['Auth']['User']['id'];
		$userLevelId =$this -> User -> find('first',array('conditions' => array('User.id' => $userid),'fields' => 'User.level_id','recursive' => -1));
		$ProLimit = $this -> Level -> find('first',array('conditions' => array('Level.id' => $userLevelId['User']['level_id']),'recursive' => -1));
		$limitProductNumber = $ProLimit['Level']['product_limit'];
		$currentProductNumber = $this -> Product -> find('count',array('conditions' => array('Product.user_id' => $userid)));
		if($currentProductNumber < $limitProductNumber){
			if (!empty($this->data)) {
				$this -> data['Product']['clicks'] = 0;
				$this -> data['Product']['user_id'] = $userid;
				$this -> data['Product']['is_pass'] = 0;
				$this -> data['Product']['release_date'] = date('Y-m-d');
				$this -> data = $this -> Filehandle -> file_upload($this -> data, 'Product', 'picture','add');
				$this->Product->create();
				if ($this->Product->save($this->data)) {
					$this->Session->setFlash(__('The product has been saved', true));
					$this->redirect(array('action' => 'bussinessListProduct'));
				} else {
					$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
				}
			}
			$districts = $this->Product->District->find('list');
			$productCats = $this->Product->ProductCat->find('list');
			$users = $this->Product->User->find('list');
			$this->set(compact('districts', 'productCats', 'users'));
		}else{
			$this->Session->setFlash(__('Limit Add'.$limitProductNumber.'Products', true));
			$this->redirect(array('action' => 'bussinessListProduct'));
		}
	}
	
	/**
	 * @name 商家查看自己产品的详情
	 */
	function bussinessViewProduct($id = null) {
		$product = $this -> Product -> find('first',array('conditions' => array('Product.id' => $id,'Product.user_id' => $_SESSION['Auth']['User']['id']),'recursive' => -1));
			if(!empty($product)){
			if (!$id) {
				$this->Session->setFlash(__('Invalid product', true));
				$this->redirect(array('action' => 'bussinessListProduct'));
			}
			$this->set('product', $this->Product->read(null, $id));
		}else{
			$this->Session->setFlash(__('Invalid id or userid for product', true));
			$this->redirect(array('action' => 'bussinessListProduct'));
		}
	}
	
	/**
	 * @name 商家修改自己的产品信息
	 */
	function bussinessEditProduct($id = null){
		$product = $this -> Product -> find('first',array('conditions' => array('Product.id' => $id,'Product.user_id' => $_SESSION['Auth']['User']['id']),'recursive' => -1));
		if(!empty($product)){
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid product', true));
				$this->redirect(array('action' => 'bussinessListProduct'));
			}
			if (!empty($this->data)) {
				$this -> data = $this -> Filehandle -> file_upload($this -> data, 'Product', 'picture');
				if ($this->Product->save($this->data)) {
					$this->Session->setFlash(__('The product has been saved', true));
					$this->redirect(array('action' => 'bussinessListProduct'));
				} else {
					$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Product->read(null, $id);
			}
			$districts = $this->Product->District->find('list');
			$productCats = $this->Product->ProductCat->find('list');
			$users = $this->Product->User->find('list');
			$this->set(compact('districts', 'productCats', 'users'));
		}else{
			$this->Session->setFlash(__('Invalid id or userid for product', true));
			$this->redirect(array('action' => 'bussinessListProduct'));
		}
	}
	
	/**
	 * @name 商家删除自己的产品
	 */
	function bussinessDeleteProduct($id = null) {
		
		$product = $this -> Product -> find('first',array('conditions' => array('Product.id' => $id,'Product.user_id' => $_SESSION['Auth']['User']['id']),'recursive' => -1));
		if(!empty($product)){
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for product', true));
				$this->redirect(array('action'=>'bussinessListProduct'));
			}
			if ($this->Product->delete($id)) {
				$this->Session->setFlash(__('Product deleted', true));
				$this->redirect(array('action'=>'bussinessListProduct'));
			}
			$this->Session->setFlash(__('Product was not deleted', true));
			$this->redirect(array('action' => 'bussinessListProduct'));
		}else{
			$this->Session->setFlash(__('Invalid id or userid for product', true));
			$this->redirect(array('action' => 'bussinessListProduct'));
		}
		
	}
}
