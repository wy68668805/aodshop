<div class="shopCollections form">
<?php echo $this->Form->create('ShopCollection');?>
	<fieldset>
		<legend><?php __('Add Shop Collection'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Shop Collections', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>