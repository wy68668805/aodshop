<?php
class GrouppurchaseProductsController extends AppController {

	var $name = 'GrouppurchaseProducts';
	var $components = array('Filehandle');
	
	function index() {
		if($_SESSION['Auth']['User']['group_id'] == 4){
			$this->redirect(array('action' => 'bussinessListGroupProduct'));
		}
		$this->GrouppurchaseProduct->recursive = 0;
		$this->set('grouppurchaseProducts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid grouppurchase product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('grouppurchaseProduct', $this->GrouppurchaseProduct->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->GrouppurchaseProduct->create();
			if ($this->GrouppurchaseProduct->save($this->data)) {
				$this->Session->setFlash(__('The grouppurchase product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grouppurchase product could not be saved. Please, try again.', true));
			}
		}
		$districts = $this->GrouppurchaseProduct->District->find('list');
		$productCats = $this->GrouppurchaseProduct->ProductCat->find('list');
		$users = $this->GrouppurchaseProduct->User->find('list');
		$this->set(compact('districts', 'productCats', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid grouppurchase product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GrouppurchaseProduct->save($this->data)) {
				$this->Session->setFlash(__('The grouppurchase product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grouppurchase product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GrouppurchaseProduct->read(null, $id);
		}
		$districts = $this->GrouppurchaseProduct->District->find('list');
		$productCats = $this->GrouppurchaseProduct->ProductCat->find('list');
		$users = $this->GrouppurchaseProduct->User->find('list');
		$this->set(compact('districts', 'productCats', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for grouppurchase product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GrouppurchaseProduct->delete($id)) {
			$this->Session->setFlash(__('Grouppurchase product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Grouppurchase product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * @name 商家查看自己的团购列表
	 */
	function bussinessListGroupProduct() {
		$this->GrouppurchaseProduct->recursive = 0;
		$grouppurchaseProducts =  $this->paginate(array('GrouppurchaseProduct.user_id' => $_SESSION['Auth']['User']['id']));
		$this->set('grouppurchaseProducts', $grouppurchaseProducts);
	}
	
	/**
	 * @name 商家发布团购
	 */
	function bussinessAddGroupProduct(){
		$this -> loadModel('User');
		$this -> loadModel('Level');
		$userid = $_SESSION['Auth']['User']['id'];
		$userLevelId =$this -> User -> find('first',array('conditions' => array('User.id' => $userid),'fields' => 'User.level_id,User.deadline','recursive' => -1));
		$ProLimit = $this -> Level -> find('first',array('conditions' => array('Level.id' => $userLevelId['User']['level_id']),'recursive' => -1));
		
		//判断用户的星级是否过期，如果过期则重置users表中值
		if($userLevelId['User']['level_id'] != 1){
			$deadline = $userLevelId['User']['deadline'];
			if($deadline < date('Y-m-d')){
				$this -> data['User']['id'] = $userid;
				$this -> data['User']['level_id'] = 1;
				$this -> data['User']['deadline'] = '0000-00-00';
				$this->User->save($this->data);
				$this->Session->setFlash(__('Your VIP has expired', true));
				$this->redirect(array('action' => 'bussinessListGroupProduct'));
			}
		}
		
		//判断该星级是否允许发布团购
		if($ProLimit['Level']['is_grouppurchase'] == 1){
			$currentProductNumber = $this -> GrouppurchaseProduct -> find('count',array('conditions' => array('GrouppurchaseProduct.user_id' => $userid)));
			//判断是否已经发布过团购产品
			if($currentProductNumber < 1){
				if (!empty($this->data)) {
					$this -> data['GrouppurchaseProduct']['clicks'] = 0;
					$this -> data['GrouppurchaseProduct']['user_id'] = $userid;
					$this -> data['GrouppurchaseProduct']['is_pass'] = 0;
					$this -> data['GrouppurchaseProduct']['sort'] = 0;
					$this -> data['GrouppurchaseProduct']['release_date'] = date('Y-m-d');
					$this -> data = $this -> Filehandle -> file_upload($this -> data, 'GrouppurchaseProduct', 'picture','add');
					$this->GrouppurchaseProduct->create();
					if ($this->GrouppurchaseProduct->save($this->data)) {
						$this->Session->setFlash(__('The grouppurchase product has been saved', true));
						$this->redirect(array('action' => 'bussinessListGroupProduct'));
					} else {
						$this->Session->setFlash(__('The grouppurchase product could not be saved. Please, try again.', true));
					}
				}
				$districts = $this->GrouppurchaseProduct->District->find('list');
				$productCats = $this->GrouppurchaseProduct->ProductCat->find('list');
				$users = $this->GrouppurchaseProduct->User->find('list');
				$this->set(compact('districts', 'productCats', 'users'));
			}else{
				$this->Session->setFlash(__('You can only add One Grouppurchase product', true));
				$this->redirect(array('action' => 'bussinessListGroupProduct'));
			}
		}else{
			$this->Session->setFlash(__('You do not have permission to Add Grouppurchase product', true));
			$this->redirect(array('action' => 'bussinessListGroupProduct'));
		}
		
	}

	function bussinessEditGroupProduct($id = null){
		$product = $this -> GrouppurchaseProduct -> find('first',array('conditions' => array('GrouppurchaseProduct.id' => $id,'GrouppurchaseProduct.user_id' => $_SESSION['Auth']['User']['id']),'recursive' => -1));
		if(!empty($product)){
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid grouppurchase product', true));
				$this->redirect(array('action' => 'bussinessListGroupProduct'));
			}
			if (!empty($this->data)) {
				$this -> data = $this -> Filehandle -> file_upload($this -> data, 'GrouppurchaseProduct', 'picture','edit');
				if ($this->GrouppurchaseProduct->save($this->data)) {
					$this->Session->setFlash(__('The grouppurchase product has been saved', true));
					$this->redirect(array('action' => 'bussinessListGroupProduct'));
				} else {
					$this->Session->setFlash(__('The grouppurchase product could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->GrouppurchaseProduct->read(null, $id);
			}
			$districts = $this->GrouppurchaseProduct->District->find('list');
			$productCats = $this->GrouppurchaseProduct->ProductCat->find('list');
			$users = $this->GrouppurchaseProduct->User->find('list');
			$this->set(compact('districts', 'productCats', 'users'));
		}else{
			$this->Session->setFlash(__('Invalid id or userid for Grouppurchase product', true));
			$this->redirect(array('action' => 'bussinessListGroupProduct'));
		}
	}
	
	function bussinessDeleteGroupProduct($id = null) {
		$product = $this -> GrouppurchaseProduct -> find('first',array('conditions' => array('GrouppurchaseProduct.id' => $id,'GrouppurchaseProduct.user_id' => $_SESSION['Auth']['User']['id']),'recursive' => -1));
		if(!empty($product)){
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for grouppurchase product', true));
				$this->redirect(array('action'=>'bussinessListGroupProduct'));
			}
			if ($this->GrouppurchaseProduct->delete($id)) {
				$this->Session->setFlash(__('Grouppurchase product deleted', true));
				$this->redirect(array('action'=>'bussinessListGroupProduct'));
			}
			$this->Session->setFlash(__('Grouppurchase product was not deleted', true));
			$this->redirect(array('action' => 'bussinessListGroupProduct'));
		}else{
			$this->Session->setFlash(__('Invalid id or userid for Grouppurchase product', true));
			$this->redirect(array('action' => 'bussinessListGroupProduct'));
		}
	}

	function bussinessViewGroupProduct($id = null) {
		$product = $this -> GrouppurchaseProduct -> find('first',array('conditions' => array('GrouppurchaseProduct.id' => $id,'GrouppurchaseProduct.user_id' => $_SESSION['Auth']['User']['id']),'recursive' => -1));
		if(!empty($product)){
			if (!$id) {
				$this->Session->setFlash(__('Invalid grouppurchase product', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('grouppurchaseProduct', $this->GrouppurchaseProduct->read(null, $id));
		}else{
			$this->Session->setFlash(__('Invalid id or userid for Grouppurchase product', true));
			$this->redirect(array('action' => 'bussinessListGroupProduct'));
		}
	}
	
}
