<div class="informationCategories form">
<?php echo $this->Form->create('InformationCategory');?>
	<fieldset>
		<legend><?php __('Add Information Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>