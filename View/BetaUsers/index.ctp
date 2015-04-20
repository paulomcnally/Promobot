<div class="betaUsers index">
	<h2><?php echo __('Beta Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('device_types_id'); ?></th>
			<th><?php echo $this->Paginator->sort('show_testimony'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($betaUsers as $betaUser): ?>
	<tr>
		<td><?php echo h($betaUser['BetaUser']['id']); ?>&nbsp;</td>
		<td><?php echo h($betaUser['BetaUser']['email']); ?>&nbsp;</td>
		<td><?php echo h($betaUser['BetaUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($betaUser['BetaUser']['active']); ?>&nbsp;</td>
		<td><?php echo h($betaUser['BetaUser']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($betaUser['DeviceType']['name'], array('controller' => 'device_types', 'action' => 'view', $betaUser['DeviceType']['id'])); ?>
		</td>
		<td><?php echo h($betaUser['BetaUser']['show_testimony']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $betaUser['BetaUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $betaUser['BetaUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $betaUser['BetaUser']['id']), null, __('Are you sure you want to delete # %s?', $betaUser['BetaUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('Nuevo usuario beta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display', 'home')); ?> </li>
	</ul>
</div>
