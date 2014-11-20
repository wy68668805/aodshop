<div class="productPurchases index">
	<h2><?php __('Product Purchases');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('purchase_info');?></th>
			<th><?php echo $this->Paginator->sort('district_id');?></th>
			<th><?php echo $this->Paginator->sort('product_cat_id');?></th>
			<th><?php echo $this->Paginator->sort('purchase_time');?></th>
			<th><?php echo $this->Paginator->sort('is_pass');?></th>
			<th><?php echo $this->Paginator->sort('pass_time');?></th>
			<th><?php echo $this->Paginator->sort('sort');?></th>
			<th><?php echo $this->Paginator->sort('backup');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productPurchases as $productPurchase):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $productPurchase['ProductPurchase']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productPurchase['User']['id'], array('controller' => 'users', 'action' => 'view', $productPurchase['User']['id'])); ?>
		</td>
		<td><?php echo $productPurchase['ProductPurchase']['title']; ?>&nbsp;</td>
		<td><?php echo $productPurchase['ProductPurchase']['purchase_info']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productPurchase['District']['name'], array('controller' => 'districts', 'action' => 'view', $productPurchase['District']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($productPurchase['ProductCat']['name'], array('controller' => 'product_cats', 'action' => 'view', $productPurchase['ProductCat']['id'])); ?>
		</td>
		<td><?php echo $productPurchase['ProductPurchase']['purchase_time']; ?>&nbsp;</td>
		<td><?php echo $productPurchase['ProductPurchase']['is_pass']; ?>&nbsp;</td>
		<td><?php echo $productPurchase['ProductPurchase']['pass_time']; ?>&nbsp;</td>
		<td><?php echo $productPurchase['ProductPurchase']['sort']; ?>&nbsp;</td>
		<td><?php echo $productPurchase['ProductPurchase']['backup']; ?>&nbsp;</td>
		<td><?php echo $productPurchase['ProductPurchase']['created']; ?>&nbsp;</td>
		<td><?php echo $productPurchase['ProductPurchase']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $productPurchase['ProductPurchase']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $productPurchase['ProductPurchase']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $productPurchase['ProductPurchase']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productPurchase['ProductPurchase']['id'])); ?>
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