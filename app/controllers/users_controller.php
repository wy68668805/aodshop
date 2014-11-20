<?php
class UsersController extends AppController {

	var $name = 'Users';

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$districts = $this->User->District->find('list');
		$userCats = $this->User->UserCat->find('list');
		$groups = $this->User->Group->find('list');
		$levels = $this->User->Level->find('list');
		$this->set(compact('districts', 'userCats', 'groups', 'levels'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$districts = $this->User->District->find('list');
		$userCats = $this->User->UserCat->find('list');
		$groups = $this->User->Group->find('list');
		$levels = $this->User->Level->find('list');
		$this->set(compact('districts', 'userCats', 'groups', 'levels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * @name 登录
	 */
	function login(){
		
	}
	
	/**
	 * @name 退出登录
	 */
	function logout(){
		// $this->Session->setFlash('Logout');
		$this->redirect($this->Auth->logout());
	}
	
	/**
	 * @name 1级管理员浏览用户
	 * @return 所有2级管理员 商家用户，以及普通用户
	 */
	function Lv1ListUser(){
		$this->User->recursive = 0;
		
		$this -> paginate = array(
			'fields' => array(
				'User.id', 'User.username','User.district_id','User.avatar','User.realname','User.email','User.phone','User.company_name','User.company_addr','User.user_cat_id','User.group_id','User.level_id',
				'User.deadline','User.is_pass','User.pass_time',
				'District.id','District.name',
				'UserCat.id','UserCat.name',
				'Group.id','Group.name',
				'Level.id','Level.name',
			)
		);
		
		$users = $this -> paginate(
			array('group_id NOT ' => array('1','2'))
		);
		$this->set('users', $users);
	}
	
	
	/**
	 * @name 1级管理员编辑用户
	 * @return 所有2级管理员 商家用户，以及普通用户
	 */
	function Lv1EditUser($id = null){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'Lv1ListUser'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$districts = $this->User->District->find('list');
		$userCats = $this->User->UserCat->find('list');
		$groups = $this->User->Group->find('list');
		$levels = $this->User->Level->find('list');
		$this->set(compact('districts', 'userCats', 'groups', 'levels'));
	}
	
	/**
	 * @name 修改该用户的等级
	 */
	function Lv1PassUser($id = null){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this ->data['User']['is_pass'] == 1){
				$this -> data['User']['pass_time'] = date('Y-m-d');
			}else{
				$this -> data['User']['pass_time'] = '0000-00-00';
			}
			
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'Lv1ListUser'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$districts = $this->User->District->find('list');
		$userCats = $this->User->UserCat->find('list');
		$groups = $this->User->Group->find('list');
		$levels = $this->User->Level->find('list');
		$this->set(compact('districts', 'userCats', 'groups', 'levels'));
	}
	
		/**
	 * @name 1级管理员查看单个用户的信息
	 * @return 所有2级管理员 商家用户，以及普通用户
	 */
	function Lv1ViewUser($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'Lv1ListUser'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	
	function Lv2ListUser(){
		$this->User->recursive = 0;
		
		$this -> paginate = array(
			'fields' => array(
				'User.id', 'User.username','User.district_id','User.avatar','User.realname','User.email','User.phone','User.company_name','User.company_addr','User.user_cat_id','User.group_id','User.level_id',
				'User.deadline','User.is_pass','User.pass_time',
				'District.id','District.name',
				'UserCat.id','UserCat.name',
				'Group.id','Group.name',
				'Level.id','Level.name',
			)
		);
		
		$users = $this -> paginate(
			array('group_id NOT ' => array('1','2','3'))
		);
		$this->set('users', $users);
	}
	
	// function signup(){
		// if (!empty($this->data)) {
			// $this -> data['User']['group_id'] = 4;
			// $this -> data['User']['user_cat_id'] = 0;
			// $this -> data['User']['level_id'] = 1;
			// $this -> data['User']['is_pass'] = 0;
			// $this->User->create();
			// if ($this->User->save($this->data)) {
				// $this->Session->setFlash(__('The user has been saved', true));
				// $this->redirect(array('action' => 'index'));
			// } else {
				// $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			// }
		// }
		// $districts = $this->User->District->find('list');
		// $userCats = $this->User->UserCat->find('list');
		// $groups = $this->User->Group->find('list');
		// $levels = $this->User->Level->find('list');
		// $this->set(compact('userCats', 'groups', 'levels','districts'));
	// }
	
	function beforeFilter(){
		// $this -> Auth -> allow('signup');
	}
}
