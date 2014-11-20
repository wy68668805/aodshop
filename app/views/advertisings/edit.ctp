<div class="advertisings form">
<?php echo $this->Form->create('Advertising');?>
	<fieldset>
		<legend><?php __('Edit Advertising'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('picture');
		echo $this->Form->input('user_id');
		echo $this->Form->input('district_id');
		echo $this->Form->input('is_system');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>