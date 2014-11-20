<div class="informationCategories view">
<h2><?php  __('Information Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $informationCategory['InformationCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $informationCategory['InformationCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $informationCategory['InformationCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $informationCategory['InformationCategory']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Information Category', true), array('action' => 'edit', $informationCategory['InformationCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Information Category', true), array('action' => 'delete', $informationCategory['InformationCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $informationCategory['InformationCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Information Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Information', true), array('controller' => 'information', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Information', true), array('controller' => 'information', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Information');?></h3>
	<?php if (!empty($informationCategory['Information'])):?>
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
		foreach ($informationCategory['Information'] as $information):
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
