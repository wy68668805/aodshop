<div class="districts index">
	<h2><?php __('Districts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('city_id');?></th>
			<th><?php echo $this->Paginator->sort('is_show');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($districts as $district):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $district['District']['id']; ?>&nbsp;</td>
		<td><?php echo $district['District']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($district['City']['name'], array('controller' => 'cities', 'action' => 'view', $district['City']['id'])); ?>
		</td>
		<td><?php echo $district['District']['is_show']; ?>&nbsp;</td>
		<td><?php echo $district['District']['created']; ?>&nbsp;</td>
		<td><?php echo $district['District']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $district['District']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $district['District']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $district['District']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $district['District']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New District', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities', true), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City', true), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Advertisings', true), array('controller' => 'advertisings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advertising', true), array('controller' => 'advertisings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grouppurchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grouppurchase Product', true), array('controller' => 'grouppurchase_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information', true), array('controller' => 'information', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Purchases', true), array('controller' => 'product_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Purchase', true), array('controller' => 'product_purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>