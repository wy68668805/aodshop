<div class="information form">
<?php echo $this->Form->create('Information');?>
	<fieldset>
		<legend><?php __('Edit Information'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('picture');
		echo $this->Form->input('content');
		echo $this->Form->input('district_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('release_date');
		echo $this->Form->input('sort');
		echo $this->Form->input('information_category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Information.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Information.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Information', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District', true), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Information Categories', true), array('controller' => 'information_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information Category', true), array('controller' => 'information_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>