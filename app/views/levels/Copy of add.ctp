<div class="levels form">
<?php echo $this->Form->create('Level');?>
	<fieldset>
		<legend><?php __('Add Level'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('integral');
		echo $this->Form->input('price');
		echo $this->Form->input('producr_limit');
		echo $this->Form->input('is_purchase');
		echo $this->Form->input('is_viewreply');
		echo $this->Form->input('is_delcomment');
		echo $this->Form->input('is_priorityranking');
		echo $this->Form->input('is_grouppurchase');
		echo $this->Form->input('is_editservice');
		echo $this->Form->input('is_reviewproduct');
		echo $this->Form->input('is_moreservice');
		echo $this->Form->input('vip_limit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Levels', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>