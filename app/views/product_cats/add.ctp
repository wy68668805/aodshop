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
<?php 
	echo $this -> element('list');
?>