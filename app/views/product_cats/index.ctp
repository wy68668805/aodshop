<div class="productCats index">
	<h2><?php __('Product Cats');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('picture');?></th>
			<th><?php echo $this->Paginator->sort('product_number');?></th>
			<th><?php echo $this->Paginator->sort('info_number');?></th>
			<th><?php echo $this->Paginator->sort('sort');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productCats as $productCat):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $productCat['ProductCat']['id']; ?>&nbsp;</td>
		<td><?php echo $productCat['ProductCat']['name']; ?>&nbsp;</td>
		<td><?php echo $productCat['ProductCat']['picture']; ?>&nbsp;</td>
		<td><?php echo $productCat['ProductCat']['product_number']; ?>&nbsp;</td>
		<td><?php echo $productCat['ProductCat']['info_number']; ?>&nbsp;</td>
		<td><?php echo $productCat['ProductCat']['sort']; ?>&nbsp;</td>
		<td><?php echo $productCat['ProductCat']['created']; ?>&nbsp;</td>
		<td><?php echo $productCat['ProductCat']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $productCat['ProductCat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $productCat['ProductCat']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $productCat['ProductCat']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productCat['ProductCat']['id'])); ?>
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