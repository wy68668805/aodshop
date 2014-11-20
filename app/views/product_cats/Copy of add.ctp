<div class="productCats form">
<?php echo $this->Form->create('ProductCat');?>
	<fieldset>
		<legend><?php __('Add Product Cat'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('picture');
		echo $this->Form->input('sort');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Product Cats', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Grouppurchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grouppurchase Product', true), array('controller' => 'grouppurchase_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Purchases', true), array('controller' => 'product_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Purchase', true), array('controller' => 'product_purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>