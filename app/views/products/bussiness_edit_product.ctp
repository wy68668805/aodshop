<div class="products form">
<?php echo $this->Form->create('Product',array('type' => 'file'));?>
	<fieldset>
		<legend><?php __('Edit Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('picture',array('type' => 'file'));
		echo $this->Form->input('price');
		echo $this->Form->input('number');
		// echo $this->Form->input('clicks');
		echo $this->Form->input('district_id');
		echo $this->Form->input('product_cat_id');
		// echo $this->Form->input('user_id');
		// echo $this->Form->input('release_date');
		// echo $this->Form->input('is_pass');
		// echo $this->Form->input('pass_time');
		// echo $this->Form->input('sort');
		echo $this->Form->input('backup');
		echo $this->Form->input('is_onsale');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>