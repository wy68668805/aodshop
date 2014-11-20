<div class="users index">
	<h2><?php __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('district_id');?></th>
			<th><?php echo $this->Paginator->sort('realname');?></th>
			<th><?php echo $this->Paginator->sort('company_name');?></th>
			<th><?php echo $this->Paginator->sort('user_cat_id');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th><?php echo $this->Paginator->sort('level_id');?></th>
			<th><?php echo $this->Paginator->sort('is_pass');?></th>
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
		<td>
			<?php echo $user['District']['name']; ?>
		</td>
		<td><?php echo $user['User']['realname']; ?>&nbsp;</td>
		<td><?php echo $user['User']['company_name']; ?>&nbsp;</td>
		<td>
			<?php echo $user['UserCat']['name']; ?>
		</td>
		<td>
			<?php echo $user['Group']['name']; ?>
		</td>
		<td>
			<?php echo $user['Level']['name']; ?>
		</td>
		<td>
			<?php if($user['User']['is_pass'] == 1){
				echo __('Pass',true);
			}else{
				echo __('Not Pass',true);
			}; ?>
			&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'Lv1ViewUser', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('EditLevel', true), array('action' => 'Lv1EditUser', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Pass', true), array('action' => 'Lv1PassUser', $user['User']['id'])); ?>
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
<?php
	echo $this -> element('list');
 ?>