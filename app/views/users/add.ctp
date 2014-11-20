<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('district_id');
		echo $this->Form->input('avatar');
		echo $this->Form->input('realname');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('company_name');
		echo $this->Form->input('company_addr');
		echo $this->Form->input('user_cat_id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('level_id');
		echo $this->Form->input('deadline');
		echo $this->Form->input('is_pass');
		echo $this->Form->input('pass_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District', true), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Cats', true), array('controller' => 'user_cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Cat', true), array('controller' => 'user_cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Levels', true), array('controller' => 'levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Level', true), array('controller' => 'levels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Advertisings', true), array('controller' => 'advertisings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advertising', true), array('controller' => 'advertisings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grouppurchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grouppurchase Product', true), array('controller' => 'grouppurchase_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information', true), array('controller' => 'information', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Collections', true), array('controller' => 'product_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Collection', true), array('controller' => 'product_collections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Comment Replies', true), array('controller' => 'product_comment_replies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Comment Reply', true), array('controller' => 'product_comment_replies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Comments', true), array('controller' => 'product_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Comment', true), array('controller' => 'product_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Purchases', true), array('controller' => 'product_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Purchase', true), array('controller' => 'product_purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Collections', true), array('controller' => 'shop_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Collection', true), array('controller' => 'shop_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>