<div class="userCats form">
<?php echo $this->Form->create('UserCat');?>
	<fieldset>
		<legend><?php __('Add User Cat'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('sort');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>