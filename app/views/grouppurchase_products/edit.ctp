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
<?php 
	echo $this -> element('list');
?>