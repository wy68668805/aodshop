<div class="levels form">
<?php echo $this->Form->create('Level');?>
	<fieldset>
		<legend><?php __('Edit Level'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('integral');
		echo $this->Form->input('price');
		echo $this->Form->input('product_limit');
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
<?php 
	echo $this -> element('list');
?>