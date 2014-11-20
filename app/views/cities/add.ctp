<div class="cities form">
<?php echo $this->Form->create('City');?>
	<fieldset>
		<legend><?php __('Add City'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('province_id');
		echo $this->Form->input('is_show');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>