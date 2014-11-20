<div class="productCats view">
<h2><?php  __('Product Cat');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productCat['ProductCat']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productCat['ProductCat']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Picture'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productCat['ProductCat']['picture']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productCat['ProductCat']['product_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Info Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productCat['ProductCat']['info_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sort'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productCat['ProductCat']['sort']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productCat['ProductCat']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productCat['ProductCat']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product Cat', true), array('action' => 'edit', $productCat['ProductCat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Product Cat', true), array('action' => 'delete', $productCat['ProductCat']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productCat['ProductCat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Cats', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Cat', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grouppurchase Products', true), array('controller' => 'grouppurchase_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grouppurchase Product', true), array('controller' => 'grouppurchase_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Purchases', true), array('controller' => 'product_purchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Purchase', true), array('controller' => 'product_purchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Grouppurchase Products');?></h3>
	<?php if (!empty($productCat['GrouppurchaseProduct'])):?>
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
		foreach ($productCat['GrouppurchaseProduct'] as $grouppurchaseProduct):
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
	<h3><?php __('Related Product Purchases');?></h3>
	<?php if (!empty($productCat['ProductPurchase'])):?>
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
		foreach ($productCat['ProductPurchase'] as $productPurchase):
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
	<?php if (!empty($productCat['Product'])):?>
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
		foreach ($productCat['Product'] as $product):
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
