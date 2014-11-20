<div class="informationCategories form">
<?php echo $this->Form->create('InformationCategory');?>
	<fieldset>
		<legend><?php __('Edit Information Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>