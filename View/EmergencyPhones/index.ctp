<div class="emergencyPhones index">
	<h2><?php echo __('Numeros de Emergencia'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('numero'); ?></th>
			<th><?php echo $this->Paginator->sort('emergencies_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($emergencyPhones as $emergencyPhone): ?>
	<tr>
		<td><?php echo h($emergencyPhone['EmergencyPhone']['id']); ?>&nbsp;</td>
		<td><?php echo h($emergencyPhone['EmergencyPhone']['numero']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($emergencyPhone['Emergency']['name'], array('controller' => 'emergencies', 'action' => 'view', $emergencyPhone['Emergency']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $emergencyPhone['EmergencyPhone']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $emergencyPhone['EmergencyPhone']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $emergencyPhone['EmergencyPhone']['id']), null, __('Are you sure you want to delete # %s?', $emergencyPhone['EmergencyPhone']['id'])); ?>
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
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Numero'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Emergencias'), array('controller' => 'emergencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Emergencia'), array('controller' => 'emergencies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display', 'home')); ?> </li>
	</ul>
</div>
