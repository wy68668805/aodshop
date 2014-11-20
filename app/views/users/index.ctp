<div class="users index">
	<h2><?php __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('district_id');?></th>
			<th><?php echo $this->Paginator->sort('avatar');?></th>
			<th><?php echo $this->Paginator->sort('realname');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('company_name');?></th>
			<th><?php echo $this->Paginator->sort('company_addr');?></th>
			<th><?php echo $this->Paginator->sort('user_cat_id');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th><?php echo $this->Paginator->sort('level_id');?></th>
			<th><?php echo $this->Paginator->sort('deadline');?></th>
			<th><?php echo $this->Paginator->sort('is_pass');?></th>
			<th><?php echo $this->Paginator->sort('pass_time');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $user['User']['username']; ?>&nbsp;</td>
		<td><?php echo $user['User']['password']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['District']['name'], array('controller' => 'districts', 'action' => 'view', $user['District']['id'])); ?>
		</td>
		<td><?php echo $user['User']['avatar']; ?>&nbsp;</td>
		<td><?php echo $user['User']['realname']; ?>&nbsp;</td>
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['phone']; ?>&nbsp;</td>
		<td><?php echo $user['User']['company_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['company_addr']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['UserCat']['name'], array('controller' => 'user_cats', 'action' => 'view', $user['UserCat']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Level']['name'], array('controller' => 'levels', 'action' => 'view', $user['Level']['id'])); ?>
		</td>
		<td><?php echo $user['User']['deadline']; ?>&nbsp;</td>
		<td><?php echo $user['User']['is_pass']; ?>&nbsp;</td>
		<td><?php echo $user['User']['pass_time']; ?>&nbsp;</td>
		<td><?php echo $user['User']['created']; ?>&nbsp;</td>
		<td><?php echo $user['User']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Districts', true), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District', true), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Cats', true), array('controller' => 'user_cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Cat', true), array('controller' => 'user_cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Levels', true), array('controller' => 'levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Level', true), array('controller' => 'levels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Advertisings', true), array('controller' => 'advertisings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Advertising', true), array('controller' => 'advertisings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grouppurchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grouppurchase Product', true), array('controller' => 'grouppurchase_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information', true), array('controller' => 'information', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Collections', true), array('controller' => 'product_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Collection', true), array('controller' => 'product_collections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Comment Replies', true), array('controller' => 'product_comment_replies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Comment Reply', true), array('controller' => 'product_comment_replies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Comments', true), array('controller' => 'product_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Comment', true), array('controller' => 'product_comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Purchases', true), array('controller' => 'product_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Purchase', true), array('controller' => 'product_purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Collections', true), array('controller' => 'shop_collections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Collection', true), array('controller' => 'shop_collections', 'action' => 'add')); ?> </li>
	</ul>
</div>