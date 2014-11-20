<div class="productComments form">
<?php echo $this->Form->create('ProductComment');?>
	<fieldset>
		<legend><?php __('Add Product Comment'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('content');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>