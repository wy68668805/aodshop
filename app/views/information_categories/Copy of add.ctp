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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Information Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information', true), array('controller' => 'information', 'action' => 'add')); ?> </li>
	</ul>
</div>