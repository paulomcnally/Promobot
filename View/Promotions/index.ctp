<div class="promotions index">
	<h2><?php echo __('Promotions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('businesses_id'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('display_number'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($promotions as $promotion): ?>
	<tr>
		<td><?php echo h($promotion['Promotion']['id']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['name']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($promotion['Businesses']['name'], array('controller' => 'businesses', 'action' => 'view', $promotion['Businesses']['id'])); ?>
		</td>
		<td><?php echo h($promotion['Promotion']['image']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['active']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['display_number']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['created']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promotion['Promotion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $promotion['Promotion']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Promotion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Businesses'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Details'), array('controller' => 'business_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion Detail'), array('controller' => 'business_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
