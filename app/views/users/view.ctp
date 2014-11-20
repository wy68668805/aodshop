<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Password'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['password']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('District'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['District']['name'], array('controller' => 'districts', 'action' => 'view', $user['District']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Avatar'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['avatar']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Realname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['realname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['phone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['company_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company Addr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['company_addr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Cat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['UserCat']['name'], array('controller' => 'user_cats', 'action' => 'view', $user['UserCat']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Level'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['Level']['name'], array('controller' => 'levels', 'action' => 'view', $user['Level']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deadline'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['deadline']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is Pass'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['is_pass']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pass Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['pass_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Advertisings');?></h3>
	<?php if (!empty($user['Advertising'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Picture'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('District Id'); ?></th>
		<th><?php __('Is System'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Advertising'] as $advertising):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $advertising['id'];?></td>
			<td><?php echo $advertising['name'];?></td>
			<td><?php echo $advertising['picture'];?></td>
			<td><?php echo $advertising['user_id'];?></td>
			<td><?php echo $advertising['district_id'];?></td>
			<td><?php echo $advertising['is_system'];?></td>
			<td><?php echo $advertising['created'];?></td>
			<td><?php echo $advertising['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'advertisings', 'action' => 'view', $advertising['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'advertisings', 'action' => 'edit', $advertising['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'advertisings', 'action' => 'delete', $advertising['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $advertising['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Advertising', true), array('controller' => 'advertisings', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Grouppurchase Products');?></h3>
	<?php if (!empty($user['GrouppurchaseProduct'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Picture'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Number'); ?></th>
		<th><?php __('Clicks'); ?></th>
		<th><?php __('District Id'); ?></th>
		<th><?php __('Product Cat Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Release Date'); ?></th>
		<th><?php __('Is Pass'); ?></th>
		<th><?php __('Pass Time'); ?></th>
		<th><?php __('Sort'); ?></th>
		<th><?php __('Backup'); ?></th>
		<th><?php __('Is Onsale'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['GrouppurchaseProduct'] as $grouppurchaseProduct):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $grouppurchaseProduct['id'];?></td>
			<td><?php echo $grouppurchaseProduct['name'];?></td>
			<td><?php echo $grouppurchaseProduct['picture'];?></td>
			<td><?php echo $grouppurchaseProduct['price'];?></td>
			<td><?php echo $grouppurchaseProduct['number'];?></td>
			<td><?php echo $grouppurchaseProduct['clicks'];?></td>
			<td><?php echo $grouppurchaseProduct['district_id'];?></td>
			<td><?php echo $grouppurchaseProduct['product_cat_id'];?></td>
			<td><?php echo $grouppurchaseProduct['user_id'];?></td>
			<td><?php echo $grouppurchaseProduct['release_date'];?></td>
			<td><?php echo $grouppurchaseProduct['is_pass'];?></td>
			<td><?php echo $grouppurchaseProduct['pass_time'];?></td>
			<td><?php echo $grouppurchaseProduct['sort'];?></td>
			<td><?php echo $grouppurchaseProduct['backup'];?></td>
			<td><?php echo $grouppurchaseProduct['is_onsale'];?></td>
			<td><?php echo $grouppurchaseProduct['created'];?></td>
			<td><?php echo $grouppurchaseProduct['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'grouppurchase_products', 'action' => 'view', $grouppurchaseProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'grouppurchase_products', 'action' => 'edit', $grouppurchaseProduct['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'grouppurchase_products', 'action' => 'delete', $grouppurchaseProduct['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $grouppurchaseProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Grouppurchase Product', true), array('controller' => 'grouppurchase_products', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Information');?></h3>
	<?php if (!empty($user['Information'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Picture'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('District Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Release Date'); ?></th>
		<th><?php __('Sort'); ?></th>
		<th><?php __('Information Category Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Information'] as $information):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $information['id'];?></td>
			<td><?php echo $information['title'];?></td>
			<td><?php echo $information['picture'];?></td>
			<td><?php echo $information['content'];?></td>
			<td><?php echo $information['district_id'];?></td>
			<td><?php echo $information['user_id'];?></td>
			<td><?php echo $information['release_date'];?></td>
			<td><?php echo $information['sort'];?></td>
			<td><?php echo $information['information_category_id'];?></td>
			<td><?php echo $information['created'];?></td>
			<td><?php echo $information['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'information', 'action' => 'view', $information['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'information', 'action' => 'edit', $information['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'information', 'action' => 'delete', $information['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $information['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Information', true), array('controller' => 'information', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Product Collections');?></h3>
	<?php if (!empty($user['ProductCollection'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Time'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['ProductCollection'] as $productCollection):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $productCollection['id'];?></td>
			<td><?php echo $productCollection['user_id'];?></td>
			<td><?php echo $productCollection['product_id'];?></td>
			<td><?php echo $productCollection['time'];?></td>
			<td><?php echo $productCollection['created'];?></td>
			<td><?php echo $productCollection['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'product_collections', 'action' => 'view', $productCollection['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'product_collections', 'action' => 'edit', $productCollection['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'product_collections', 'action' => 'delete', $productCollection['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productCollection['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Collection', true), array('controller' => 'product_collections', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Product Comment Replies');?></h3>
	<?php if (!empty($user['ProductCommentReply'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Product Purchase Id'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Time'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['ProductCommentReply'] as $productCommentReply):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $productCommentReply['id'];?></td>
			<td><?php echo $productCommentReply['user_id'];?></td>
			<td><?php echo $productCommentReply['product_purchase_id'];?></td>
			<td><?php echo $productCommentReply['content'];?></td>
			<td><?php echo $productCommentReply['time'];?></td>
			<td><?php echo $productCommentReply['created'];?></td>
			<td><?php echo $productCommentReply['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'product_comment_replies', 'action' => 'view', $productCommentReply['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'product_comment_replies', 'action' => 'edit', $productCommentReply['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'product_comment_replies', 'action' => 'delete', $productCommentReply['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productCommentReply['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Comment Reply', true), array('controller' => 'product_comment_replies', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Product Comments');?></h3>
	<?php if (!empty($user['ProductComment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Content'); ?></th>
		<th><?php __('Time'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['ProductComment'] as $productComment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $productComment['id'];?></td>
			<td><?php echo $productComment['user_id'];?></td>
			<td><?php echo $productComment['product_id'];?></td>
			<td><?php echo $productComment['content'];?></td>
			<td><?php echo $productComment['time'];?></td>
			<td><?php echo $productComment['created'];?></td>
			<td><?php echo $productComment['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'product_comments', 'action' => 'view', $productComment['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'product_comments', 'action' => 'edit', $productComment['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'product_comments', 'action' => 'delete', $productComment['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productComment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Comment', true), array('controller' => 'product_comments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Product Purchases');?></h3>
	<?php if (!empty($user['ProductPurchase'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Purchase Info'); ?></th>
		<th><?php __('District Id'); ?></th>
		<th><?php __('Product Cat Id'); ?></th>
		<th><?php __('Purchase Time'); ?></th>
		<th><?php __('Is Pass'); ?></th>
		<th><?php __('Pass Time'); ?></th>
		<th><?php __('Sort'); ?></th>
		<th><?php __('Backup'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['ProductPurchase'] as $productPurchase):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $productPurchase['id'];?></td>
			<td><?php echo $productPurchase['user_id'];?></td>
			<td><?php echo $productPurchase['title'];?></td>
			<td><?php echo $productPurchase['purchase_info'];?></td>
			<td><?php echo $productPurchase['district_id'];?></td>
			<td><?php echo $productPurchase['product_cat_id'];?></td>
			<td><?php echo $productPurchase['purchase_time'];?></td>
			<td><?php echo $productPurchase['is_pass'];?></td>
			<td><?php echo $productPurchase['pass_time'];?></td>
			<td><?php echo $productPurchase['sort'];?></td>
			<td><?php echo $productPurchase['backup'];?></td>
			<td><?php echo $productPurchase['created'];?></td>
			<td><?php echo $productPurchase['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'product_purchases', 'action' => 'view', $productPurchase['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'product_purchases', 'action' => 'edit', $productPurchase['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'product_purchases', 'action' => 'delete', $productPurchase['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productPurchase['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product Purchase', true), array('controller' => 'product_purchases', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Products');?></h3>
	<?php if (!empty($user['Product'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Picture'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Number'); ?></th>
		<th><?php __('Clicks'); ?></th>
		<th><?php __('District Id'); ?></th>
		<th><?php __('Product Cat Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Release Date'); ?></th>
		<th><?php __('Is Pass'); ?></th>
		<th><?php __('Pass Time'); ?></th>
		<th><?php __('Sort'); ?></th>
		<th><?php __('Backup'); ?></th>
		<th><?php __('Is Onsale'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Product'] as $product):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $product['id'];?></td>
			<td><?php echo $product['name'];?></td>
			<td><?php echo $product['picture'];?></td>
			<td><?php echo $product['price'];?></td>
			<td><?php echo $product['number'];?></td>
			<td><?php echo $product['clicks'];?></td>
			<td><?php echo $product['district_id'];?></td>
			<td><?php echo $product['product_cat_id'];?></td>
			<td><?php echo $product['user_id'];?></td>
			<td><?php echo $product['release_date'];?></td>
			<td><?php echo $product['is_pass'];?></td>
			<td><?php echo $product['pass_time'];?></td>
			<td><?php echo $product['sort'];?></td>
			<td><?php echo $product['backup'];?></td>
			<td><?php echo $product['is_onsale'];?></td>
			<td><?php echo $product['created'];?></td>
			<td><?php echo $product['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'products', 'action' => 'delete', $product['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Shop Collections');?></h3>
	<?php if (!empty($user['ShopCollection'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Shop Id'); ?></th>
		<th><?php __('Time'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['ShopCollection'] as $shopCollection):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $shopCollection['id'];?></td>
			<td><?php echo $shopCollection['user_id'];?></td>
			<td><?php echo $shopCollection['shop_id'];?></td>
			<td><?php echo $shopCollection['time'];?></td>
			<td><?php echo $shopCollection['created'];?></td>
			<td><?php echo $shopCollection['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'shop_collections', 'action' => 'view', $shopCollection['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'shop_collections', 'action' => 'edit', $shopCollection['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'shop_collections', 'action' => 'delete', $shopCollection['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $shopCollection['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shop Collection', true), array('controller' => 'shop_collections', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
