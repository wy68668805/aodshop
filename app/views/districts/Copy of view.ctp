<div class="districts view">
<h2><?php  __('District');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $district['District']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $district['District']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('City'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($district['City']['name'], array('controller' => 'cities', 'action' => 'view', $district['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is Show'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $district['District']['is_show']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $district['District']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $district['District']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit District', true), array('action' => 'edit', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete District', true), array('action' => 'delete', $district['District']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $district['District']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Advertisings');?></h3>
	<?php if (!empty($district['Advertising'])):?>
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
		foreach ($district['Advertising'] as $advertising):
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
	<?php if (!empty($district['GrouppurchaseProduct'])):?>
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
		foreach ($district['GrouppurchaseProduct'] as $grouppurchaseProduct):
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
	<?php if (!empty($district['Information'])):?>
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
		foreach ($district['Information'] as $information):
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
	<h3><?php __('Related Product Purchases');?></h3>
	<?php if (!empty($district['ProductPurchase'])):?>
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
		foreach ($district['ProductPurchase'] as $productPurchase):
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
	<?php if (!empty($district['Product'])):?>
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
		foreach ($district['Product'] as $product):
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
	<h3><?php __('Related Users');?></h3>
	<?php if (!empty($district['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Username'); ?></th>
		<th><?php __('Password'); ?></th>
		<th><?php __('District Id'); ?></th>
		<th><?php __('Avatar'); ?></th>
		<th><?php __('Realname'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Phone'); ?></th>
		<th><?php __('Company Name'); ?></th>
		<th><?php __('Company Addr'); ?></th>
		<th><?php __('User Cat Id'); ?></th>
		<th><?php __('Group Id'); ?></th>
		<th><?php __('Level Id'); ?></th>
		<th><?php __('Deadline'); ?></th>
		<th><?php __('Is Pass'); ?></th>
		<th><?php __('Pass Time'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($district['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['district_id'];?></td>
			<td><?php echo $user['avatar'];?></td>
			<td><?php echo $user['realname'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['phone'];?></td>
			<td><?php echo $user['company_name'];?></td>
			<td><?php echo $user['company_addr'];?></td>
			<td><?php echo $user['user_cat_id'];?></td>
			<td><?php echo $user['group_id'];?></td>
			<td><?php echo $user['level_id'];?></td>
			<td><?php echo $user['deadline'];?></td>
			<td><?php echo $user['is_pass'];?></td>
			<td><?php echo $user['pass_time'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'users', 'action' => 'delete', $user['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
