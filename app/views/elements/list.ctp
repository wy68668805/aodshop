<?php
	if($_SESSION['Auth']['User']['group_id'] == 1){ ?>
	<div class="actions">
		<h3><?php __('Actions'); ?></h3>
		<ul>
	
			<li><?php echo $this -> Html -> link(__('List Users', true), array('controller' => 'users','action' => 'index')); ?></li>
			<li><?php echo $this -> Html -> link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New District', true), array('controller' => 'districts', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List User Cats', true), array('controller' => 'user_cats', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New User Cat', true), array('controller' => 'user_cats', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Levels', true), array('controller' => 'levels', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Level', true), array('controller' => 'levels', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Advertisings', true), array('controller' => 'advertisings', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Advertising', true), array('controller' => 'advertisings', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Grouppurchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Grouppurchase Product', true), array('controller' => 'grouppurchase_products', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Information', true), array('controller' => 'information', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Collections', true), array('controller' => 'product_collections', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Product Collection', true), array('controller' => 'product_collections', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Comment Replies', true), array('controller' => 'product_comment_replies', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Product Comment Reply', true), array('controller' => 'product_comment_replies', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Comments', true), array('controller' => 'product_comments', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Product Comment', true), array('controller' => 'product_comments', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Purchases', true), array('controller' => 'product_purchases', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Product Purchase', true), array('controller' => 'product_purchases', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Shop Collections', true), array('controller' => 'shop_collections', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('New Shop Collection', true), array('controller' => 'shop_collections', 'action' => 'add')); ?> </li>
		</ul>
	</div>
			
<?php }elseif($_SESSION['Auth']['User']['group_id'] == 2){ ?>
	<div class="actions">
		<h3><?php __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this -> Html -> link(__('List User Cats', true), array('controller' => 'user_cats', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Users', true), array('controller' => 'users','action' => 'Lv1ListUser')); ?></li>
			<li><?php echo $this -> Html -> link(__('List Provinces', true), array('controller' => 'provinces', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Cities', true), array('controller' => 'cities', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Levels', true), array('controller' => 'levels', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Information Category', true), array('controller' => 'information_categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Categories', true), array('controller' => 'product_cats', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Group Purchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Collections', true), array('controller' => 'product_collections', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Shop Collections', true), array('controller' => 'shop_collections', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Purchases', true), array('controller' => 'product_purchases', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Purchases Replies', true), array('controller' => 'product_comment_replies', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Comments', true), array('controller' => 'product_comments', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Advertisings', true), array('controller' => 'advertisings', 'action' => 'index')); ?> </li>
		</ul>
	</div>	
	
<?php }elseif($_SESSION['Auth']['User']['group_id'] == 3){ ?>
	<div class="actions">
		<h3><?php __('Actions'); ?></h3>
		<ul>	
			<li><?php echo $this -> Html -> link(__('List User Cats', true), array('controller' => 'user_cats', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Users', true), array('controller' => 'users','action' => 'Lv2ListUser')); ?></li>
			<li><?php echo $this -> Html -> link(__('List Provinces', true), array('controller' => 'provinces', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Cities', true), array('controller' => 'cities', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Levels', true), array('controller' => 'levels', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Information Category', true), array('controller' => 'information_categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Categories', true), array('controller' => 'product_cats', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Group Purchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Collections', true), array('controller' => 'product_collections', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Shop Collections', true), array('controller' => 'shop_collections', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Purchases', true), array('controller' => 'product_purchases', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Purchases Replies', true), array('controller' => 'product_comment_replies', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Product Comments', true), array('controller' => 'product_comments', 'action' => 'index')); ?> </li>
			<li><?php echo $this -> Html -> link(__('List Advertisings', true), array('controller' => 'advertisings', 'action' => 'index')); ?> </li>
		</ul>
	</div>
<?php }elseif($_SESSION['Auth']['User']['group_id'] == 4){ ?>
	<div class="actions">
		<h3><?php __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this -> Html -> link(__('My Products', true), array('controller' => 'products', 'action' => 'bussinessListProduct')); ?> </li>
			<li><?php echo $this -> Html -> link(__('My Group Purchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'bussinessListGroupProduct')); ?> </li>
			
		</ul>
	</div>	
<?php } ?>
