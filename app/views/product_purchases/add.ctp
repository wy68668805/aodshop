<div class="productPurchases form">
<?php echo $this->Form->create('ProductPurchase');?>
	<fieldset>
		<legend><?php __('Add Product Purchase'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('purchase_info');
		echo $this->Form->input('district_id');
		echo $this->Form->input('product_cat_id');
		echo $this->Form->input('purchase_time');
		echo $this->Form->input('is_pass');
		echo $this->Form->input('pass_time');
		echo $this->Form->input('sort');
		echo $this->Form->input('backup');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>