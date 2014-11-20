<div class="productCommentReplies index">
	<h2><?php __('Product Comment Replies');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('product_purchase_id');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productCommentReplies as $productCommentReply):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $productCommentReply['ProductCommentReply']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productCommentReply['User']['id'], array('controller' => 'users', 'action' => 'view', $productCommentReply['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($productCommentReply['ProductPurchase']['title'], array('controller' => 'product_purchases', 'action' => 'view', $productCommentReply['ProductPurchase']['id'])); ?>
		</td>
		<td><?php echo $productCommentReply['ProductCommentReply']['content']; ?>&nbsp;</td>
		<td><?php echo $productCommentReply['ProductCommentReply']['time']; ?>&nbsp;</td>
		<td><?php echo $productCommentReply['ProductCommentReply']['created']; ?>&nbsp;</td>
		<td><?php echo $productCommentReply['ProductCommentReply']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $productCommentReply['ProductCommentReply']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $productCommentReply['ProductCommentReply']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $productCommentReply['ProductCommentReply']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productCommentReply['ProductCommentReply']['id'])); ?>
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