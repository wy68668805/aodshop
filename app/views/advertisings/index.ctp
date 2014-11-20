<div class="advertisings index">
	<h2><?php __('Advertisings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('picture');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('district_id');?></th>
			<th><?php echo $this->Paginator->sort('is_system');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($advertisings as $advertising):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $advertising['Advertising']['id']; ?>&nbsp;</td>
		<td><?php echo $advertising['Advertising']['name']; ?>&nbsp;</td>
		<td><?php echo $advertising['Advertising']['picture']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($advertising['User']['id'], array('controller' => 'users', 'action' => 'view', $advertising['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($advertising['District']['name'], array('controller' => 'districts', 'action' => 'view', $advertising['District']['id'])); ?>
		</td>
		<td><?php echo $advertising['Advertising']['is_system']; ?>&nbsp;</td>
		<td><?php echo $advertising['Advertising']['created']; ?>&nbsp;</td>
		<td><?php echo $advertising['Advertising']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $advertising['Advertising']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $advertising['Advertising']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $advertising['Advertising']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $advertising['Advertising']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php 
	echo $this -> element('list');
?>