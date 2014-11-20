<?php

class ApiController extends AppController {

	var $name = 'Api';
	var $uses = array('User');
	var $components = array('Filehandle');
	/**
	 * @name 获取省份
	 * @param int $recursive -1 ~ 2
	 * @return 省份相关json格式数组
	 */
	function getProvinces($recursive = 0){
		$this -> loadModel('Province');
		$this -> loadModel('City');
		if(is_numeric($recursive) && 0 <= $recursive && $recursive <=2){
			$this -> Province -> recursive = $recursive;
			$this-> Province -> hasMany['City']['fields']=array('id','name','province_id');
			$this-> City -> hasMany['District']['fields']=array('id','name');
			$this ->City -> unbindModel(
		        array('belongsTo' => array('Province'))
		    );
			$provinces = $this -> Province -> find('all',
				array(
					'conditions' => array(
						'is_show' => 1
					),
					'fields' => array('id','name'),
				)
				
			);
			$this -> returnJson(0,'success',$provinces);
		}else{
			$this -> returnJson('-1','recursive必须为0至2的整数');
		}
	}
	
	/**
	 * @name 获取城市
	 * @param int $recursive 0为只查询自己 ，1为查询自己及自集.2为查询自己、子集及父集
	 * @param int $province_id 省份id
	 * @return 城市相关json格式数组
	 */
	
	function getCities($recursive = 0,$province_id = null) {
		$this -> loadModel('City');
		$this -> loadModel('District');
		$this -> loadModel('Province');
		if(is_numeric($recursive) && 0 <= $recursive && $recursive <=2){
			$this-> City -> hasMany['District']['fields']=array('id','name');
			$this -> City -> recursive = $recursive;
			$this ->District -> unbindModel(
			        array(
			        	'hasMany' => array('Advertising','GrouppurchaseProduct','Information','ProductPurchase','Product','User'),
						'belongsTo' => array('City')
						)
			    );
			$this -> Province -> unbindModel(
					  array('hasMany' => array('City'))
			    );
			$this-> City -> belongsTo['Province']['fields']=array('id','name');
			if ($province_id != null && is_numeric($province_id)) {
				$cities = $this -> City -> find('all',array(
					'conditions' => array('province_id' => $province_id,'City.is_show' => 1),
					'fields' => array('id','name','province_id'),
					));
			}else{	
				$cities = $this -> City -> find('all',array(
					'conditions' => array('City.is_show' => 1),
					'fields' => array('id','name','province_id'),
					));
			}
			$this -> returnJson(0,'success',$cities);
		}else{
			$this -> returnJson(-1,'recursive必须为0至2的整数');
		}
		die;
	}
	
	
	/**
	 * @name 获取区域
	 * @param int $recursive 0为只查询自己 ，1为查询自己及自集.2为查询自己、子集及父集
	 * @param int $province_id 省份id
	 * @return 城市相关json格式数组
	 */
	function getDistricts($recursive = 0,$city_id = null){
		$this -> loadModel('District');
		$this -> loadModel('City');
		$this -> loadModel('Province');
		if(is_numeric($recursive) && 0 <= $recursive && $recursive <=2){
			$this -> District -> recursive = $recursive;
			$this -> District -> belongsTo['City']['fields'] =array('id','name','province_id');
			$this -> District -> unbindModel(array(
	        	'hasMany' => array('Advertising','GrouppurchaseProduct','Information','ProductPurchase','Product','User'),
				)
			);
			
			$this -> City -> belongsTo['Province']['fields']=array('id','name');
			$this -> City -> unbindModel(array(
		      	'hasMany' => array('District'),
				)
		    );
			if ($city_id != null && is_numeric($city_id)) {
				$districts = $this -> District -> find('all',array(
					'conditions' => array('city_id' => $city_id,'District.is_show' => 1),
					'fields' => array('id','name','city_id'),
					)
				);
			}else{
				$districts = $this -> District -> find('all',array(
					'conditions' => array('District.is_show' => 1),
					'fields' => array('id','name','city_id')
					)
				);
			}
			
			if($recursive == 1){
				$this -> City -> recursive = -1;
				foreach($districts as $key => $value){
					$city= $this -> City -> find('first',array('conditions' => array('City.id' => $value['District']['city_id']),'fields' => array('id','name')));
					$districts[$key]['City'] = $city['City'];
				}		
			}
			$this -> returnJson(0,'success',$districts);
		}else{
			$this -> returnJson(-1,'recursive必须为0至2的整数');
		}
		die;	
	}
	
	/**
	 * @name 用户注册
	 * @param string $username 用户名
	 * @param string $password 密码
	 * @return 0成功，-1用户名为空,-2用户名长度不在6-16之间，-3密码为空，-4密码的长度不在6-40位之间，-5区域id为空或者不是一个数字，-6用户已存在，-7意外终止
	 */
	function register(){
		if(!empty($_POST['username'])){
			if($this -> checkStrLegth($_POST['username'], 6, 16)){
				$username = htmlspecialchars($_POST['username']);
			}else{
				$this -> returnJson(-2,'用户名不在6-16位之间');
			}
		}else{
			$this -> returnJson(-1,'用户名为空');
		}
		
		if(!empty($_POST['password'])){
			if($this -> checkStrLegth($_POST['password'], 6, 40)){
				$password = htmlspecialchars($_POST['password']);
			}else{
				$this -> returnJson(-4,'密码不在6-40位之间');
			}
		}else{
			$this -> returnJson(-3,'密码为空');
		}
		
		if(!empty($_POST['district_id']) && is_numeric($_POST['district_id'])){
			$district_id = $_POST['district_id'];
		}else{
			$this -> returnJson(-5,'区域id为空或者不是一个数字');
		}
		
		$this -> User -> recursive = -1;
		$exsits_user = $this -> User -> find('first',array('conditions' => array('username' => $username),'fields' => array('username')));
		if(empty($exsits_user)){
			$this -> data['User']['username'] = $username;
			$this -> data['User']['password'] = $this -> Auth -> password($password);
			$this -> data['User']['district_id'] = $district_id;
			$this -> data['User']['group_id'] = 4;
            $this -> data['User']['user_cat_id'] = 0;
            $this -> data['User']['level_id'] = 1;
            $this -> data['User']['is_pass'] = 0;
			$key = strtotime(date('Ymdhis')).$password.microtime();
			$this -> data['User']['appkey'] = $this -> Auth -> password($key);
			if (!empty($this->data)) {
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this -> returnJson(0,'注册成功');
				} else {
					$this -> returnJson(-7,'数据库服务器异常，注册失败');
				}
			}
		}else{
			$this -> returnJson(-6,'用户名已存在');
		}
		die;
	}
	
	
	/**
	 * @name 用户登录
	 * @param string $username 用户名
	 * @param string $password 密码
	 * @return 0成功,-1用户名为空,-2用户名长度不在6-16之间，-3密码为空，-4密码的长度不在6-40位之间，-5用户不存在
	 */
	function login() {
		if(!empty($_POST['username'])){
			if($this -> checkStrLegth($_POST['username'], 6, 16)){
				$username = htmlspecialchars($_POST['username']);
			}else{
				$this -> returnJson(-2,'用户名不在6-16位之间');
			}
		}else{
			$this -> returnJson(-1,'用户名为空');
		}
		
		if(!empty($_POST['password'])){
			if($this -> checkStrLegth($_POST['password'], 6, 40)){
				$password = htmlspecialchars($_POST['password']);
			}else{
				$this -> returnJson(-4,'密码不在6-40位之间');
			}
		}else{
			$this -> returnJson(-3,'密码为空');
		}
		
		$password = $this -> Auth -> password($password);
		$this -> User -> recursive = -1;
		$user = $this -> User -> find(
			'first',array(
				'conditions' => array(
					'username' => $username,
					'password' => $password
					),
				'fields' => array('id','username','appkey','is_pass'),
				)
			);
		if(!empty($user)){
			if($user['User']['is_pass'] == '1'){
				$this -> returnJson(0,'登陆成功',$user);
			}else{
				$this -> returnJson(-6,'用户未激活');
			}
			
		}else{
			$this -> returnJson(-5,'用户不存在');
		}
	 die;
	}
	
	/**
	 * @name 获取用户信息
	 * @param int $userid 用户id
	 * @param varchar $appkey key
	 * @return 0成功，-100用户id为空或者不是数字，-101key为空或者等于0，-102用户不存在, -103用户key有误;
	 */
	function getUserInfo(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$this -> User -> recursive = 1;
			$this -> User -> hasMany = array();
			$userid = $_POST['userid'];
			$userinfo = $this -> User -> find(
				'first',array(
					'conditions' => array(
						'User.id' => $userid
						),
					'fields' => array(
							'id','username','district_id','avatar','realname','email','phone','company_name','company_addr','user_cat_id','group_id','level_id','deadline','is_pass','pass_time'
						)
					)
				);
			$this -> returnJson(0,'成功',$userinfo);
		}else{
			echo $checkvalue;
		}
		die;
	}
	
	
	/**
	 * @name 用户头像修改
	 * @param int $userid 用户id
	 * @param string $appkey key
	 * @param array $_FILES 图片信息
	 * @return 0成功，-100用户id为空或者不是数字，-101key为空或者等于0，-102用户不存在, -103用户key有误 -1文件信息不全，-2上传失败，-3上传的不是jpg、png、gif格式的文件或者文件大于2M;
	 */
	function uploadAvatar(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$this -> data['User']['id'] = $_POST['userid'];
			if(!empty($_FILES['avatar'])){
				if(($_FILES['avatar']['type'] == 'image/jpeg' || $_FILES['avatar']['type'] == 'image/gif' || $_FILES['avatar']['type'] == 'image/png') && $_FILES['avatar']['size'] <= '2097152'){
					$this -> data['User']['avatar'] = $_FILES['avatar'];
				}else{
					$this -> returnJson(-3,'上传的不是jpg,png,gif格式的文件,或图片大于2Mb');
				}
			}else{
				$this -> returnJson(-1,'文件信息不全');
			}
			
			$this -> data = $this -> Filehandle -> file_upload($this -> data, 'User', 'avatar');
			if ($this -> User -> save($this -> data)) {
				$this -> returnJson(0,'上传成功');
			} else {
				$this -> returnJson(-2,'上传失败');
			}
			
		}else{
			echo $checkvalue;
		}
		die;
	}
	
	
		/**
		 * @name 修改用户信息
		 * @param int $userid 用户id
		 * @param string $appkey key
		 * @param int $district_id 区域id
		 * @param string $realname 真实姓名
		 * @param string $email 电子邮箱
		 * @param string $phone 手机号
		 * @param string $company_name 公司名称
		 * @param string $company_addr 公司地址
		 * @param int $user_cat_id 用户分类id
		 * @return 0成功，-100用户id为空或者不是数字，-101key为空或者等于0，-102用户不存在, -103用户key有误，-1保存失败;
		 */
		function editUserInfo(){
			$checkvalue = $this -> checkUserKey();
			if($checkvalue == 0){
				$this -> data['User']['id'] = $_POST['userid'];
				if(!empty($_POST['district_id'])){
					$this -> data['User']['district_id'] = $_POST['district_id'];
				}else{
					unset($this -> data['User']['district_id']);
				}
				
				if(!empty($_POST['realname'])){
					$this -> data['User']['realname'] = $_POST['realname'];
				}else{
					unset($this -> data['User']['realname']);
				}
				
				if(!empty($_POST['email'])){
					$this -> data['User']['email'] = $_POST['email'];
				}else{
					unset($this -> data['User']['email']);
				}
				
				if(!empty($_POST['phone'])){
					$this -> data['User']['phone'] = $_POST['phone'];
				}else{
					unset($this -> data['User']['phone']);
				}
				
				// if(!empty($_POST['company_name'])){
					// $this -> data['User']['company_name'] = $_POST['company_name'];
				// }else{
					// unset($this -> data['User']['company_name']);
				// }
// 				
				// if(!empty($_POST['company_addr'])){
					// $this -> data['User']['company_addr'] = $_POST['company_addr'];
				// }else{
					// unset($this -> data['User']['company_addr']);
				// }
// 				
				// if(!empty($_POST['user_cat_id'])){
					// $this -> data['User']['user_cat_id'] = $_POST['user_cat_id'];
				// }else{
					// unset($this -> data['User']['user_cat_id']);
				// }
// 				
				if ($this-> User -> save($this->data)) {
					$this -> returnJson(0,'更改成功');
				} else {
					$this -> returnJson(-1,'更改失败');
				}
			}else{
				echo $checkvalue;
			}
			die;
		}


	/**
		 * @name 修改用户密码
		 * @param int $userid 用户id
		 * @param string $appkey key
	 	 * @param string oldpassword 旧密码 
		 * @param string $newpassword 密码
		 * @param string $repassword 重复密码
		 * @return 0成功，-100用户id为空或者不是数字，-101key为空或者等于0，-102用户不存在, -103用户key有误,-1旧密码不能为空,-2旧密码错误，-3密码或重复密码不能为空，-4两次密码输入不一致，-5密码不在6-40位之间，-6更改密码失败;
		 */
		function editUserPassword(){
			$checkvalue = $this -> checkUserKey();
			if($checkvalue == 0){
				$userid = $_POST['userid'];
				$this -> data['User']['id'] = $userid;
				
				if(!empty($_POST['oldpassword'])){
					$oldpassword = $this -> Auth -> password($_POST['oldpassword']);
					$userinfo = $this -> User -> find('first',array('conditions' => array('User.id' => $userid,'User.password' => $oldpassword)));
					if(empty($userinfo)){
						$this -> returnJson(-2,'旧密码错误');
					}
				}else{
					$this -> returnJson(-1,'旧密码不能为空');
				}
				
				if(!empty($_POST['newpassword']) && !empty($_POST['repassword'])){
					if($_POST['newpassword'] == $_POST['repassword']){
						if($this -> checkStrLegth($_POST['newpassword'],6,40)){
							$this -> data['User']['password'] = $this -> Auth -> password($_POST['newpassword']);
						}else{
							$this -> returnJson(-5,'密码不在6-40位之间');
						}
					}else{
						$this -> returnJson(-4,'两次密码输入不一致');
					}
				}else{
					$this -> returnJson(-3,'密码或重复密码不能为空');
				}
				if ($this-> User -> save($this->data)) {
					$this -> returnJson(0,'更改密码成功');
				} else {
					$this -> returnJson(-6,'更改密码失败');
				}
			}else{
				echo $checkvalue;
			}
			die;
		}
		
		/**
		 * @name 获取商品信息
		 * @param int $userid
	     * @param string $appkey
		 * @param int $start 从第几条记录开始
		 * @param int $number 显示几条
		 * @return 商品相关数据
		 */
		function getProducts($districtid = 0,$ispass = 1,$onsale = 1,$start = null,$number = null){
			if(isset($districtid) && is_numeric($districtid)){
				$districtid = $districtid;
			}else{
				$this -> returnJson(-3,'区域id不能为空');
			}
			
			if(isset($start) && is_numeric($start) && isset($number) && is_numeric($number)){
				$limit = "{$start},{$number}";
			}elseif(!empty($start) && is_numeric($start)){
				$limit = "{$start}";
			}else{
				$limit = "";
			}
			
			if($ispass != 1 && ($ispass != 0)){
				$this -> returnJson(-1,'ispass只能为1或者0');
			}
			
			if($onsale != 1 && ($onsale !=0)){
				$this -> returnJson(-2,'onsale只能为1或者0');
			}
			
				$this -> loadModel('Product');
				$this -> Product -> recursive = 2;
				$this -> Product -> District -> unbindModel(
			        array(
			        	'belongsTo' => array('City'),
						'hasMany' => array('Advertising','GrouppurchaseProduct','Information','ProductPurchase','Product','User')
						)
			    );
				$this -> Product -> ProductCat -> unbindModel(
					array(
						'hasMany' => array('GrouppurchaseProduct','ProductPurchase','Product')
					)
				);
				$this -> Product -> User -> unbindModel(
					array(
						'belongsTo' => array('District','UserCat','Group','Level'),
						'hasMany' => array('Advertising','Information','ProductCollection','ProductCommentReply','ProductComment','ShopCollection','GrouppurchaseProduct','ProductPurchase','Product')
					)
				);
				
				$this -> Product-> hasMany = array();
				$this -> Product-> belongsTo['User']['fields']=array('id','company_name','company_addr');
				
				if($districtid == 0){
					$products = $this -> Product -> find(
						'all',array(
							'conditions' => array(
								'Product.is_pass' => $ispass,
								'Product.is_onsale' => $onsale
							),
							'fields' => array(
								'id','name','picture','price','number','clicks','district_id','product_cat_id','user_id','release_date','sort','backup'
							),
							'limit' => $limit,
						)
					);
					$productsCount = $this -> Product -> find(
						'count',array(
							'conditions' => array(
								'Product.is_pass' => $ispass,
								'Product.is_onsale' => $onsale
							)
						)
					);
				}else{
					$products = $this -> Product -> find(
						'all',array(
							'conditions' => array(
								'Product.district_id' => $districtid,
								'Product.is_pass' => $ispass,
								'Product.is_onsale' => $onsale
							),
							'fields' => array(
								'id','name','picture','price','number','clicks','district_id','product_cat_id','user_id','release_date','sort','backup'
							),
							'limit' => $limit,
						)
					);
					$productsCount = $this -> Product -> find(
						'count',array(
							'conditions' => array(
								'Product.district_id' => $districtid,
								'Product.is_pass' => $ispass,
								'Product.is_onsale' => $onsale
							)
						)
					);	
				}
				
				$value = array('products'=> $products,'count' => $productsCount);
				$this -> returnJson(0,'获取成功',$value);
				die;
		}
	
	
	/**
	 * @name 获取单个产品信息
	 * @param int productid
	 * @return json格式数据
	 */
	function getSingleProduct($productid = null){
		if(!empty($productid)){
			$this -> loadModel('Product');
			$this -> Product -> recursive = 0;
			$product = $this -> Product -> find('first',array(
				'conditions' => array(
					'Product.id' => $productid
					),
				'fields' => array(
					'Product.id','Product.name','Product.picture','Product.price','Product.number','Product.clicks','Product.district_id','Product.product_cat_id','Product.user_id','Product.release_date',
					'Product.is_pass','Product.pass_time','Product.sort','Product.backup','Product.is_onsale',
					'District.id','District.name',
					'ProductCat.id','ProductCat.name','ProductCat.picture','ProductCat.product_number',
					'User.id','User.username','User.company_name','User.company_addr','User.email','User.phone','User.is_pass'
					)
				)
			);
			$this -> returnJson(0,'获取成功',$product);
			
		}else{
			$this -> returnJson(-1,'productid不能为空');
		}
		die;
	}
	
	/**
	 * @name 添加产品收藏
	 * @param int $userid
	 * @param string $appkey
	 * @param int productid
	 */
	function addProductCollection(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$this -> loadModel('ProductCollection');
			$userid = $_POST['userid'];
			if(!empty($_POST['productid']) && is_numeric($_POST['productid'])){
				$alreadyCollection = $this -> ProductCollection -> find('first',array('conditions' => array('ProductCollection.user_id'=> $userid,'ProductCollection.product_id' => $_POST['productid'])));
				if(!empty($alreadyCollection)){
					$this -> returnJson(-3,'已经收藏过此商品');
				}else{
					$productid = $_POST['productid'];
				}
			}else{
				$this -> returnJson(-1,'产品id不能为空');
			}
			
			$userid = $_POST['userid'];
			$date = date('Y-m-d');
			
			$this -> data['ProductCollection']['user_id'] = $userid;
			$this -> data['ProductCollection']['product_id'] = $productid;
			$this -> data['ProductCollection']['time'] = $date;
			$this->ProductCollection->create();
			if ($this->ProductCollection->save($this->data)) {
				$this -> returnJson(0,'添加成功');
			} else {
				$this -> returnJson(-2,'添加失败');
			}
		}else{
			echo $checkvalue;
		}
	}

	/**
	 * @name 删除产品收藏
	 * @param int $userid
	 * @param string $appkey
	 * @param int productcollectionid 产品收藏id
	 */
	function deleteProductCollection(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$userid = $_POST['userid'];
			if(!empty($_POST['productcollectionid']) && is_numeric($_POST['productcollectionid'])){
				$productCollectionId = $_POST['productcollectionid'];
			}else{
				$this -> returnJson(-1,'产品收藏id为空或不是一个数字');
			}
			$this -> loadModel('ProductCollection');
			$is_productC = $this -> ProductCollection -> find('first',array('conditions' => array('ProductCollection.id' => $productCollectionId)));
			if(!empty($is_productC)){
				if($is_productC['ProductCollection']['user_id'] != $userid){
					$this -> returnJson(-2,'无权删除别人的收藏');
				}
			}else{
				$this -> returnJson(-3,'没有此id');
			}
			
			if ($this->ProductCollection->delete($productCollectionId)) {
				$this -> returnJson(0,'删除成功');
			}
		}else{
			echo $checkvalue;
		}
		die;
	}
	
	/**
	 * @name 浏览个人收藏
	 * @param int $userid
	 * @param string appkey
	 * @return 0:成功，
	 */
	function listProductCollection(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			if(isset($_POST['start']) && is_numeric($_POST['start']) && isset($_POST['number']) && is_numeric($_POST['number'])){
				$limit = "{$_POST['start']},{$_POST['number']}";
			}elseif(!empty($_POST['start']) && is_numeric($_POST['start'])){
				$limit = "{$_POST['start']}";
			}else{
				$limit = "";
			}
			$this -> loadModel('ProductCollection');
			$userid = $_POST['userid'];
			$this -> ProductCollection-> belongsTo['User']['fields']=array('id','username');
			$this -> ProductCollection-> belongsTo['Product']['fields']=array('id','name','is_pass','is_onsale');
			$ProductCollections = $this -> ProductCollection -> find(
				'all',array(
					'conditions' => array(
						'ProductCollection.user_id' => $userid
						),
						'limit' => $limit
					)
				);
			$ProductCollectionsCount = $this -> ProductCollection -> find(
				'all',array(
					'conditions' => array(
						'ProductCollection.user_id' => $userid
						),
					)
				);
			$count = count($ProductCollectionsCount);
			$value = array('ProductCollections'=> $ProductCollections,'count' => $count);
			$this -> returnJson(0,'获取成功',$value);
		}else{
			echo $checkvalue;
		}
		die;
	}
	
	/**
	 * @name 添加商家收藏
	 * @param int $userid
	 * @param string $appkey
	 * @param int shopid
	 */
	function addShopCollection(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$this -> loadModel('ShopCollection');
			$userid = $_POST['userid'];
			if(!empty($_POST['shopid']) && is_numeric($_POST['shopid'])){
				$alreadyCollection = $this -> ShopCollection -> find('first',array('conditions' => array('ShopCollection.user_id'=> $userid,'ShopCollection.shop_id' => $_POST['shopid'])));
				if(!empty($alreadyCollection)){
					$this -> returnJson(-3,'已经收藏过此商家');
				}else{
					$shopid = $_POST['shopid'];
				}
			}else{
				$this -> returnJson(-1,'商家id不能为空');
			}
			
			$userid = $_POST['userid'];
			$date = date('Y-m-d');
			
			$this -> data['ShopCollection']['user_id'] = $userid;
			$this -> data['ShopCollection']['shop_id'] = $shopid;
			$this -> data['ShopCollection']['time'] = $date;
			$this->ShopCollection->create();
			if ($this->ShopCollection->save($this->data)) {
				$this -> returnJson(0,'添加成功');
			} else {
				$this -> returnJson(-2,'添加失败');
			}
		}else{
			echo $checkvalue;
		}
	}
	
	
	/**
	 * @name 删除商家收藏
	 * @param int $userid
	 * @param string $appkey
	 * @param int shopcollectionid 产品收藏id
	 */
	function deleteShopCollection(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$userid = $_POST['userid'];
			if(!empty($_POST['shopcollectionid']) && is_numeric($_POST['shopcollectionid'])){
				$shopcollectionid = $_POST['shopcollectionid'];
			}else{
				$this -> returnJson(-1,'产品收藏id为空或不是一个数字');
			}
			$this -> loadModel('ShopCollection');
			$is_productC = $this -> ShopCollection -> find('first',array('conditions' => array('ShopCollection.id' => $shopcollectionid)));
			if(!empty($is_productC)){
				if($is_productC['ShopCollection']['user_id'] != $userid){
					$this -> returnJson(-2,'无权删除别人的收藏');
				}
			}else{
				$this -> returnJson(-3,'没有此id');
			}
			
			if ($this->ShopCollection->delete($shopcollectionid)) {
				$this -> returnJson(0,'删除成功');
			}
		}else{
			echo $checkvalue;
		}
		die;
	}
	
	
	/**
	 * @name 浏览个人商家收藏
	 * @param int $userid
	 * @param string appkey
	 * @return 0:成功，
	 */
	function listShopCollection(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$this -> loadModel('ShopCollection');
			$userid = $_POST['userid'];
			if(isset($_POST['start']) && is_numeric($_POST['start']) && isset($_POST['number']) && is_numeric($_POST['number'])){
				$limit = "{$_POST['start']},{$_POST['number']}";
			}elseif(isset($_POST['start']) && is_numeric($_POST['start'])){
				$limit = "{$_POST['start']}";
			}else{
				$limit = "";
			}
			$ProductCollections = $this -> ShopCollection -> find(
				'all',array(
					'conditions' => array(
						'ShopCollection.user_id' => $userid
						),
					'fields' => array(
						'ShopCollection.id',
						'ShopCollection.user_id',
						'ShopCollection.shop_id',
						'ShopCollection.time',
						'User.id',
						'User.username',
						'Shop.id',
						'Shop.company_name'
					),
					'limit' => $limit,
					)
				);
				
			$ProductCollectionsCount = $this -> ShopCollection -> find(
				'all',array(
					'conditions' => array(
						'ShopCollection.user_id' => $userid
						),
					'fields' => array(
						'ShopCollection.id',
						'ShopCollection.user_id',
						'ShopCollection.shop_id',
						'ShopCollection.time',
						'User.id',
						'User.username',
						'Shop.id',
						'Shop.company_name'
					)
					)
				);
				
			// $this -> returnJson(0,'返回成功',$ProductCollections);		
			
			$count = count($ProductCollectionsCount);
			$value = array('ProductCollections'=> $ProductCollections,'count' => $count);
			$this -> returnJson(0,'获取成功',$value);
		}else{
			echo $checkvalue;
		}
		die;
	}
	
	/**
	 * @name 获取信息列表
	 * @param int userid 用户id
	 * @param string appkey 通信key
	 * @param int typeid 信息类型
	 * @param int start 从第几条数据开始找
	 * @param int number 显示多少条数据
	 * @return json数组
	 */
	function getInfomations(){
		$this -> loadModel('Information');
		if(!empty($_POST['typeid'])){
			$typeid = $_POST['typeid'];
		}else{
			$this -> returnJson(-1,'信息类型不能为空');
		}
		 
		if(isset($_POST['districtid']) && is_numeric($_POST['districtid'])){
			$districtid = $_POST['`districtid`'];
		}else{
			$this -> returnJson(-2,'区域id不能为空');
		}
		
		if(isset($_POST['start']) && is_numeric($_POST['start']) && isset($_POST['number']) && is_numeric($_POST['number'])){
			$limit = "{$_POST['start']},{$_POST['number']}";
		}elseif(isset($_POST['start']) && is_numeric($_POST['start'])){
			$limit = "{$_POST['start']}";
		}else{
			$limit = "";
		}
		
		$information = $this -> Information -> find(
			'all',array(
				'conditions' => array(
					'information_category_id' => $typeid
				),
				'limit' => $limit
			)
		);
		
		$informationCount = $this -> Information -> find(
			'all',array(
				'conditions' => array(
					'information_category_id' => $typeid
				)
			)
		);
		
		
		$count = count($informationCount);
		$value = array('information'=> $information,'count' => $count);
		$this -> returnJson(0,'获取成功',$value);

		die;
	}
		
	/**
	 * @name 获取广告
	 * @param int district_id 地区id
	 * @param int start 从第几条数据开始获取
	 * @param int number 获取几条
	 * @return json数组
	 */
	function getAdvertisings($district_id,$start = null,$number = null){
		$this -> loadModel('Advertising');
		$this -> Advertising -> recursive = 1;
		$this -> Advertising -> unbindModel(array('belongsTo' => array('User')));
		if(isset($district_id) && $district_id > 0){
			$district_id = $district_id;
		}else{
			$this -> returnJson(-1,'区域id');
		}
		
			if(isset($start) && is_numeric($start) && isset($number) && is_numeric($number)){
				$limit = "{$start},{$number}";
			}elseif(isset($start) && is_numeric($start)){
				$limit = "{$start}";
			}else{
				$limit = "";
			}
		
		$advertisings = $this -> Advertising -> find(
			'all',array(
				'conditions' => array(
						'Advertising.district_id' => $district_id,
						'is_system' => 0
					),
				'fields' => array('Advertising.id','Advertising.name','Advertising.picture','Advertising.is_system','District.id','District.name'),
				'limit' => $limit
				)
			);
		$count =  $this -> Advertising -> find(
			'all',array(
				'conditions' => array(
						'Advertising.district_id' => $district_id,
						'is_system' => 0
					),
				'fields' => array('Advertising.id','Advertising.name','Advertising.picture','Advertising.is_system','District.id','District.name'),
				)
			);		
		$count = count($count);
			$ids = null;
		foreach($advertisings as $key => $value){
			$ids[]=  $value['Advertising']['id'];
		}
		
		//如果不满需求的数量，则把当前地区的系统广告一起加上
		if(count($advertisings) != $number){
			$dvalue = $number - count($advertisings);
			$this -> Advertising -> unbindModel(array('belongsTo' => array('User')));
			$localsystems = $this -> Advertising -> find(
				'all',array(
					'conditions' => array(
						'NOT' => array(
							'Advertising.id' => $ids
						),
						'Advertising.district_id' => $district_id,
						'is_system' => '1'
						
					),
					'fields' => array('Advertising.id','Advertising.name','Advertising.picture','Advertising.is_system','District.id','District.name'),
					'limit' => $dvalue
				)
			);
			
			$idss = null;
			foreach($localsystems as $localsystem){
				$advertisings[] = $localsystem;
				$idss[]=  $value['Advertising']['id'];
			}
			$count = $count + count($localsystems);
			//如果还不够数量，则把其他地区的系统广告也一并加上
			if(count($advertisings) != $number){
				$ddvalue = $number - count($advertisings);
				$this -> Advertising -> unbindModel(array('belongsTo' => array('User')));
				$localsystems = $this -> Advertising -> find(
					'all',array(
						'conditions' => array(
							'NOT' => array(
								'Advertising.id' => $idss
							),
							'is_system' => '1'
							
						),
						'fields' => array('Advertising.id','Advertising.name','Advertising.picture','Advertising.is_system','District.id','District.name'),
						'limit' => $ddvalue
					)
				);
				foreach($localsystems as $localsystem){
					$advertisings[] = $localsystem;
				}
				$count = $count + count($localsystems);
			}
		}
		$value = array('advertisings'=> $advertisings,'count' => $count);
		$this -> returnJson(0,'获取成功',$value);
		die;
		
	}
	
	
	/**
	 * @name 获取商品评论
	 * @param int userid 用户id
	 * @param string appkey 通信key
	 * @param int prductid 产品id
	 * @return json数组
	 */
	function getProductComments(){
			if(isset($_POST['productid'])){
				$productid = $_POST['productid'];
			}else{
				$this -> returnJson(-1,'productid不能为空');
			}
			
			
			if(isset($_POST['start']) && is_numeric($_POST['start']) && isset($_POST['number']) && is_numeric($_POST['number'])){
				$limit = "{$_POST['start']},{$_POST['number']}";
			}elseif(isset($_POST['start']) && is_numeric($_POST['start'])){
				$limit = "{$_POST['start']}";
			}else{
				$limit = "";
			}
			
			$this -> loadModel('ProductComment');
			$comments = $this -> ProductComment -> find(
				'all',array(
					'conditions' => array(
						'ProductComment.product_id' => $productid,
					),
					'fields' => array(
						'ProductComment.id',
						'ProductComment.user_id',
						'ProductComment.product_id',
						'ProductComment.content',
						'ProductComment.time',
						'User.id',
						'User.username',
						'Product.id',
						'Product.name',
					),
					'limit' => $limit
				)
			);
			
			$count = $this -> ProductComment -> find(
				'count',array(
					'conditions' => array(
						'ProductComment.product_id' => $productid,
					)
				)
			);
			$value = array('comments'=> $comments,'count' => $count);
			$this -> returnJson(0,'获取成功',$value);
		die;
	}
	
	/**
	 * @name 获取单个用户的所有评论
	 * @param int userid 用户id
	 * @param string appkey 通信key
	 */
	function getUserComments(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$userid = $_POST['userid'];
			$this -> loadModel('ProductComment');
			
			if(isset($_POST['start']) && is_numeric($_POST['start']) && isset($_POST['number']) && is_numeric($_POST['number'])){
				$limit = "{$_POST['start']},{$_POST['number']}";
			}elseif(isset($_POST['start']) && is_numeric($_POST['start'])){
				$limit = "{$_POST['start']}";
			}else{
				$limit = "";
			}
			
			
			$comments = $this -> ProductComment -> find(
				'all',array(
					'conditions' => array(
						'ProductComment.user_id' => $userid,
					),
					'fields' => array(
						'ProductComment.id',
						'ProductComment.user_id',
						'ProductComment.product_id',
						'ProductComment.content',
						'ProductComment.time',
						'User.id',
						'User.username',
						'Product.id',
						'Product.name',
					),
					'limit' => $limit
				)
			);
			
			$count = $this -> ProductComment -> find(
				'count',array(
					'conditions' => array(
						'ProductComment.user_id' => $userid,
					)
				)
			);
			
			
			$value = array('comments'=> $comments,'count' => $count);
			$this -> returnJson(0,'获取成功',$value);
		}else{
			echo $checkvalue;
		}
		die;
	}
	
	/**
	 * @name 添加商品评论
	 * @param int userid 用户id
	 * @param string appkey 通信key
	 * @param int productid 产品id
	 * @param string content 评论内容
	 * @return -1productid不能为空,-2评论内容不能为空,-3评论失败
	 */
	function addProductComment(){
		$checkvalue = $this -> checkUserKey();
		if($checkvalue == 0){
			$userid  = $_POST['userid'];
			if(isset($_POST['productid'])){
				$productid = $_POST['productid'];
			}else{
				$this -> returnJson(-1,'productid不能为空');
			}
			
			if(isset($_POST['content'])){
				$content = $_POST['content'];
			}else{
				$this -> returnJson(-2,'评论内容不能为空');
			}
			
			$this -> data['ProductComment']['user_id'] = $userid;
			$this -> data['ProductComment']['product_id'] = $productid;
			$this -> data['ProductComment']['content'] = $content;
			$this -> data['ProductComment']['time'] = date('Y-m-d');
			$this -> loadModel('ProductComment');
			$this -> ProductComment -> create();
			if ($this -> ProductComment -> save($this -> data)) {
				$this -> returnJson(0,'评论成功');
			} else {
				$this -> returnJson(-3,'评论失败');
			}
		}else{
			echo $checkvalue;
		}
		die;
	}
	
	
	/**
	 * @name 获取商家的列表
	 * @param int $start
	 * @param int $number
	 * @return 返回商家列表
	 */
	 function getBusinessList(){	
		if(isset($_POST['recursive']) && is_numeric($_POST['recursive'])){
			$recursive = $_POST['recursive'];
		}else{
			$recursive = -1;
		}
		
		
	 	if(isset($_POST['start']) && is_numeric($_POST['start']) && isset($_POST['number']) && is_numeric($_POST['number'])){
			$limit = "{$_POST['start']},{$_POST['number']}";
		}elseif(isset($_POST['start']) && is_numeric($_POST['start'])){
			$limit = "{$_POST['start']}";
		}else{
			$limit = "";
		}
		
		
		
		if(!empty($_POST['userid']) && is_numeric($_POST['userid'])){
			$this -> User -> recursive = 0;
			$users = $this -> User -> find(
				'all',array(
					'conditions' => array(
						'group_id' => 4,
						'User.id' => $_POST['userid']
					),
					'fields' => array(
						'User.id','User.company_name','User.email','User.phone','User.company_addr','User.user_cat_id','User.level_id','User.district_id',
						'District.id','District.name',
						'UserCat.id','UserCat.name',		
						'Level.id','Level.name'
						),
					'limit' => $limit,
					
				)
			);
			
			$count = $user = $this -> User -> find(
				'count',array(
					'conditions' => array(
						'group_id' => 4,
						'is_pass' => 1,
						'User.id' => $_POST['userid']
					),
				)
			);
			$this -> returnJson(0,'获取成功',$users);
		}else{
			if($recursive == 0){
			$this -> User -> recursive = 0;
				$users = $this -> User -> find(
					'all',array(
						'conditions' => array(
							'group_id' => 4,
							'is_pass' => 1
						),
						'fields' => array(
							'User.id','User.company_name','User.email','User.phone','User.company_addr','User.user_cat_id','User.level_id','User.district_id',
							'District.id','District.name',
							'UserCat.id','UserCat.name',		
							'Level.id','Level.name'
							),
						'limit' => $limit,
						
					)
				);
				
			}else if($recursive == -1){
				$this -> User -> recursive = -1;
				$users = $this -> User -> find(
					'all',array(
						'conditions' => array(
							'group_id' => 4,
							'is_pass' => 1
						),
						'fields' => array(
							'User.id','User.company_name','User.email','User.phone','User.company_addr'
							),
						'limit' => $limit,
						
					)
				);
			}
			
			$count = $user = $this -> User -> find(
				'count',array(
					'conditions' => array(
						'group_id' => 4,
						'is_pass' => 1
					),
				)
			);
		}
		
		
		$value = array('BusinessList'=> $users,'count' => $count);
		$this -> returnJson(0,'获取成功',$value);
	 }
	
	
	/**
	 * @name 获取团购信息列表
	 * @param int $districtid 区域id
	 * @param int ispass 是否通过审核的团购
	 * @param int isonsale 是否是在销售中的团购产品
	 * @param int start 开始行数
	 * @param int number 显示几行
	 * @return
	 */
	 
	 function getGroupPurchases($districtid = 0,$ispass = 1,$isonsale = 1,$start = null,$number = null){
	 	if(isset($start) && is_numeric($start) && isset($number) && is_numeric($number)){
			$limit = "{$start},{$number}";
		}elseif(isset($start) && is_numeric($start)){
			$limit = "{$start}";
		}else{
			$limit = "";
		}
		
		if($ispass != 1 && $ispass != 0){
			$ispass == 1;
		}
		
		if($isonsale != 1 && $isonsale != 0){
			$isonsale == 1;
		}
		
	 	$this -> loadModel('GrouppurchaseProduct');
		$this -> GrouppurchaseProduct -> recursive = -1;
		if($districtid == 0){
			$gpps = $this -> GrouppurchaseProduct -> find('all',array(
				'conditions' => array(
					'GrouppurchaseProduct.is_pass' => $ispass,
					'GrouppurchaseProduct.is_onsale' => $isonsale
					),
				'fields' => array(
					'GrouppurchaseProduct.id','GrouppurchaseProduct.name','GrouppurchaseProduct.picture','GrouppurchaseProduct.price','GrouppurchaseProduct.number','GrouppurchaseProduct.sort','GrouppurchaseProduct.is_pass',
					'GrouppurchaseProduct.is_onsale'
					),
				'limit' => $limit
				)
			);
			
			$count = $this -> GrouppurchaseProduct -> find('count',array(
				'conditions' => array(
					'GrouppurchaseProduct.is_pass' => $ispass,
					'GrouppurchaseProduct.is_onsale' => $isonsale
					), 
				)
			);
		}else{
			$gpps = $this -> GrouppurchaseProduct -> find('all',array(
				'conditions' => array(
					'GrouppurchaseProduct.district_id' => $districtid,
					'GrouppurchaseProduct.is_pass' => $ispass,
					'GrouppurchaseProduct.is_onsale' => $isonsale
					),
				'fields' => array(
					'GrouppurchaseProduct.id','GrouppurchaseProduct.name','GrouppurchaseProduct.picture','GrouppurchaseProduct.price','GrouppurchaseProduct.number','GrouppurchaseProduct.sort','GrouppurchaseProduct.is_pass',
					'GrouppurchaseProduct.is_onsale'
					),
				'limit' => $limit
				)
			);
			
			$count = $this -> GrouppurchaseProduct -> find('count',array(
				'conditions' => array(
					'GrouppurchaseProduct.district_id' => $districtid,
					'GrouppurchaseProduct.is_pass' => $ispass,
					'GrouppurchaseProduct.is_onsale' => $isonsale
					), 
				)
			);
		}
		
		$value = array('grouppurchase'=> $gpps,'count' => $count);
		$this -> returnJson(0,'获取成功',$value);
		die;
	 }

	function getSingleGroupPurchase($grouppurchaseid = null){
		if(!empty($grouppurchaseid)){
			$this -> loadModel('GrouppurchaseProduct');
			$this -> GrouppurchaseProduct -> recursive = 0;
			$GrouppurchaseProduct = $this -> GrouppurchaseProduct -> find('first',array(
				'conditions' => array(
					'GrouppurchaseProduct.id' => $grouppurchaseid
					),
				'fields' => array(
					'GrouppurchaseProduct.id','GrouppurchaseProduct.name','GrouppurchaseProduct.picture','GrouppurchaseProduct.price','GrouppurchaseProduct.number','GrouppurchaseProduct.clicks',
					'GrouppurchaseProduct.district_id','GrouppurchaseProduct.product_cat_id','GrouppurchaseProduct.user_id','GrouppurchaseProduct.release_date','GrouppurchaseProduct.is_pass',
					'GrouppurchaseProduct.pass_time','GrouppurchaseProduct.sort','GrouppurchaseProduct.backup','GrouppurchaseProduct.is_onsale',
					'District.id','District.name',
					'ProductCat.id','ProductCat.name','ProductCat.picture','ProductCat.product_number',
					'User.id','User.username','User.company_name','User.company_addr','User.email','User.phone','User.is_pass'
					)
				)
			);
			$this -> returnJson(0,'获取成功',$GrouppurchaseProduct);
			
		}else{
			$this -> returnJson(-1,'grouppurchaseid不能为空');
		}
		die;
		
	}
	
	/**
	 * @name 获取某个特定表的数据
	 * @param int $userid 已登录用户的id
	 * @param int $appkey 已登录用户的key
	 * @param String $model 查询的模型层
	 * @param int $recurscive 查询的等级
	 * @param int $id 要查询的具体id
	 */
	// function getSpecificData(){
		// $checkvalue = $this -> checkUserKey();
		// if($checkvalue == 0){
// 			
		// }else{
			// echo $checkvalue;
			// die;
		// }
		// $conditions = json_decode($_POST['conditions']);
// 		
		// foreach($conditions -> conditions  as $key => $value){
			// $cond['conditions'][$key] = $value;
		// }
// 		
		// foreach($conditions -> fields as $value){
			// $cond['fields'][] = $value;
		// }
		// $models = array('Advertising','City','District',);
		// echo $_POST['model'];
		// pr($cond);
// 		
		// die;
	// }
// 	
	/**
	 * @name 判断字符串长度是否合理
	 * @param String $string 被检测的字符串
	 * @param Int $min 字符串的最小长度
	 * @param Int $max 字符串的最大长度
	 * @return true/false
	 */
	function checkStrLegth($string,$min,$max){
		if($min <= strlen($string) && strlen($string) <= $max ){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * @name 检查用户key是否正确。
	 * @param Int $id 用户id
	 * @param String $key 用户key
	 * @return 0成功，-100用户id为空或者不是数字，-101key为空或者等于0，-102用户不存在, -103用户key有误;
	 */
	
	function checkUserKey(){
		if(empty($_POST['userid']) || !is_numeric($_POST['userid'])){
			$this -> returnJson(-100,'用户id为空或者不是一个数字');
		}
		if(empty($_POST['appkey']) || $_POST['appkey'] == '0' ){
			$this -> returnJson(-101,'appkey为空或者appkey的值等于0');
		}
		$_POST['appkey'] = htmlspecialchars($_POST['appkey']);
		$user = $this -> User -> find('first',array('conditions' => array('User.id' => $_POST['userid'])));
		if(!empty($user)){
			$chekkey = $this -> User -> find('first',array('conditions' => array('User.id' => $_POST['userid'],'appkey' => $_POST['appkey'])));
			if(!empty($chekkey)){
				return 0;
			}else{
				$this -> returnJson(-103,'appkey有误');
			}
		}else{
			$this -> returnJson(-102,'用户不存在');
		}
	}
		
	function returnJson($index = 0,$message = null,$data = null){
		$result = array();
		if($data == null){
			$result = array('success' => $index,'message' => $message);
		}else{
			$result = array('success' => $index,'message' => $message,'data'=>$data);
		}
		echo json_encode($result);
		die;			
	}
	
	function beforeFilter() {
		$this -> Auth -> allow(array('*'));
	}

}
