<div class="information index">
	<h2><?php __('Information');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('picture');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('district_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('release_date');?></th>
			<th><?php echo $this->Paginator->sort('sort');?></th>
			<th><?php echo $this->Paginator->sort('information_category_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($information as $information):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $information['Information']['id']; ?>&nbsp;</td>
		<td><?php echo $information['Information']['title']; ?>&nbsp;</td>
		<td><?php echo $information['Information']['picture']; ?>&nbsp;</td>
		<td><?php echo $information['Information']['content']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($information['District']['name'], array('controller' => 'districts', 'action' => 'view', $information['District']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($information['User']['id'], array('controller' => 'users', 'action' => 'view', $information['User']['id'])); ?>
		</td>
		<td><?php echo $information['Information']['release_date']; ?>&nbsp;</td>
		<td><?php echo $information['Information']['sort']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($information['InformationCategory']['name'], array('controller' => 'information_categories', 'action' => 'view', $information['InformationCategory']['id'])); ?>
		</td>
		<td><?php echo $information['Information']['created']; ?>&nbsp;</td>
		<td><?php echo $information['Information']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $information['Information']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $information['Information']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $information['Information']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $information['Information']['id'])); ?>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Information', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District', true), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Information Categories', true), array('controller' => 'information_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information Category', true), array('controller' => 'information_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>