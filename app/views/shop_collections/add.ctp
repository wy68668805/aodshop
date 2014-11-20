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
<?php 
	echo $this -> element('list');
?>
