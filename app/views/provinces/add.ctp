<div class="provinces form">
<?php echo $this->Form->create('Province');?>
	<fieldset>
		<legend><?php __('Add Province'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('is_show');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>