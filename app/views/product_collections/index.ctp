<div class="productCollections index">
	<h2><?php __('Product Collections');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productCollections as $productCollection):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $productCollection['ProductCollection']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productCollection['User']['id'], array('controller' => 'users', 'action' => 'view', $productCollection['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($productCollection['Product']['name'], array('controller' => 'products', 'action' => 'view', $productCollection['Product']['id'])); ?>
		</td>
		<td><?php echo $productCollection['ProductCollection']['time']; ?>&nbsp;</td>
		<td><?php echo $productCollection['ProductCollection']['created']; ?>&nbsp;</td>
		<td><?php echo $productCollection['ProductCollection']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $productCollection['ProductCollection']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $productCollection['ProductCollection']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $productCollection['ProductCollection']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productCollection['ProductCollection']['id'])); ?>
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