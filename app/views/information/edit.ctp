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
<?php 
	echo $this -> element('list');
?>