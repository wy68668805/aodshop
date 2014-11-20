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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('InformationCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('InformationCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Information Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information', true), array('controller' => 'information', 'action' => 'add')); ?> </li>
	</ul>
</div>