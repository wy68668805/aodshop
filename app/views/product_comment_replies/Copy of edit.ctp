<div class="productCommentReplies form">
<?php echo $this->Form->create('ProductCommentReply');?>
	<fieldset>
		<legend><?php __('Edit Product Comment Reply'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('product_purchase_id');
		echo $this->Form->input('content');
		echo $this->Form->input('time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
	echo $this -> element('list');
?>