<div class="grouppurchaseProducts form">
<?php echo $this->Form->create('GrouppurchaseProduct');?>
	<fieldset>
		<legend><?php __('Edit Grouppurchase Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('picture');
		echo $this->Form->input('price');
		echo $this->Form->input('number');
		echo $this->Form->input('clicks');
		echo $this->Form->input('district_id');
		echo $this->Form->input('product_cat_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('release_date');
		echo $this->Form->input('is_pass');
		echo $this->Form->input('pass_time');
		echo $this->Form->input('sort');
		echo $this->Form->input('backup');
		echo $this->Form->input('is_onsale');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('GrouppurchaseProduct.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('GrouppurchaseProduct.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Grouppurchase Products', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District', true), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Cats', true), array('controller' => 'product_cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Cat', true), array('controller' => 'product_cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>