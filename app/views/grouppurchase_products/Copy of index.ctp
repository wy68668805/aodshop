<div class="grouppurchaseProducts index">
	<h2><?php __('Grouppurchase Products');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('picture');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('number');?></th>
			<th><?php echo $this->Paginator->sort('clicks');?></th>
			<th><?php echo $this->Paginator->sort('district_id');?></th>
			<th><?php echo $this->Paginator->sort('product_cat_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('release_date');?></th>
			<th><?php echo $this->Paginator->sort('is_pass');?></th>
			<th><?php echo $this->Paginator->sort('pass_time');?></th>
			<th><?php echo $this->Paginator->sort('sort');?></th>
			<th><?php echo $this->Paginator->sort('backup');?></th>
			<th><?php echo $this->Paginator->sort('is_onsale');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($grouppurchaseProducts as $grouppurchaseProduct):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['id']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['name']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['picture']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['price']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['number']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['clicks']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($grouppurchaseProduct['District']['name'], array('controller' => 'districts', 'action' => 'view', $grouppurchaseProduct['District']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($grouppurchaseProduct['ProductCat']['name'], array('controller' => 'product_cats', 'action' => 'view', $grouppurchaseProduct['ProductCat']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($grouppurchaseProduct['User']['id'], array('controller' => 'users', 'action' => 'view', $grouppurchaseProduct['User']['id'])); ?>
		</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['release_date']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['is_pass']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['pass_time']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['sort']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['backup']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['is_onsale']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['created']; ?>&nbsp;</td>
		<td><?php echo $grouppurchaseProduct['GrouppurchaseProduct']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $grouppurchaseProduct['GrouppurchaseProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $grouppurchaseProduct['GrouppurchaseProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $grouppurchaseProduct['GrouppurchaseProduct']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $grouppurchaseProduct['GrouppurchaseProduct']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Grouppurchase Product', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District', true), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Cats', true), array('controller' => 'product_cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Cat', true), array('controller' => 'product_cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>