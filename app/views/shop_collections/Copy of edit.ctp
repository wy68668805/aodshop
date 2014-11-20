<div class="shopCollections form">
<?php echo $this->Form->create('ShopCollection');?>
	<fieldset>
		<legend><?php __('Edit Shop Collection'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('shop_id');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ShopCollection.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ShopCollection.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Shop Collections', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>