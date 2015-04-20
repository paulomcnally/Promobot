<div class="businessDetails index">
	<h2><?php echo __('Business Details'); ?></h2>
	<?php echo $this->Html->link('Negocios',$referer);?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('lat'); ?></th>
			<th><?php echo $this->Paginator->sort('long'); ?></th>
			<th><?php echo $this->Paginator->sort('businesses_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cities_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($businessDetails as $businessDetail): ?>
	<tr>
		<td><?php echo h($businessDetail['BusinessDetail']['id']); ?>&nbsp;</td>
		<td><?php echo h($businessDetail['BusinessDetail']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($businessDetail['BusinessDetail']['lat']); ?>&nbsp;</td>
		<td><?php echo h($businessDetail['BusinessDetail']['long']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($businessDetail['Business']['name'], array('controller' => 'businesses', 'action' => 'view', $businessDetail['Business']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($businessDetail['City']['name'], array('controller' => 'cities', 'action' => 'view', $businessDetail['City']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $businessDetail['BusinessDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $businessDetail['BusinessDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $businessDetail['BusinessDetail']['id']), null, __('Are you sure you want to delete # %s?', $businessDetail['BusinessDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Detalle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Negocios'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Negocio'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciudades'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Ciudad'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
