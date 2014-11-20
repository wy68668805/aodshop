<div class="districts form">
<?php echo $this->Form->create('District');?>
	<fieldset>
		<legend><?php __('Add District'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('city_id');
		echo $this->Form->input('is_show');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>