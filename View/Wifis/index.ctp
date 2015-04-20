<div class="wifis index">
	<h2><?php echo __('Wifis'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('long'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('verificado'); ?></th>
			<th><?php echo $this->Paginator->sort('verificado_date'); ?></th>
			<th><?php echo $this->Paginator->sort('users_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($wifis as $wifi): ?>
	<tr>
		<td><?php echo h($wifi['Wifi']['id']); ?>&nbsp;</td>
		<td><?php echo h($wifi['Wifi']['lat']); ?>&nbsp;</td>
		<td><?php echo h($wifi['Wifi']['long']); ?>&nbsp;</td>
		<td><?php echo h($wifi['Wifi']['name']); ?>&nbsp;</td>
		<td><?php echo h($wifi['Wifi']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($wifi['Wifi']['verificado']); ?>&nbsp;</td>
		<td><?php echo h($wifi['Wifi']['verificado_date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($wifi['Users']['id'], array('controller' => 'users', 'action' => 'view', $wifi['Users']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $wifi['Wifi']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $wifi['Wifi']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $wifi['Wifi']['id']), null, __('Seguro que desea borrar # %s?', $wifi['Wifi']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Wifi'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Ususario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>
