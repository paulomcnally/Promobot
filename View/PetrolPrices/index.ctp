<div class="petrolPrices index">
	<h2><?php echo __('Precio Gasolina'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('precio'); ?></th>
			<th><?php echo $this->Paginator->sort('petrol_categories_id'); ?></th>
			<th><?php echo $this->Paginator->sort('petrols_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($petrolPrices as $petrolPrice): ?>
	<tr>
		<td><?php echo h($petrolPrice['PetrolPrice']['id']); ?>&nbsp;</td>
		<td><?php echo h($petrolPrice['PetrolPrice']['precio']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($petrolPrice['PetrolCategory']['name'], array('controller' => 'petrol_categories', 'action' => 'view', $petrolPrice['PetrolCategory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($petrolPrice['Petrol']['name'], array('controller' => 'petrols', 'action' => 'view', $petrolPrice['Petrol']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $petrolPrice['PetrolPrice']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $petrolPrice['PetrolPrice']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $petrolPrice['PetrolPrice']['id']), null, __('Are you sure you want to delete # %s?', $petrolPrice['PetrolPrice']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Precio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'petrol_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'petrol_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gasolineras'), array('controller' => 'petrols', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gasolinera'), array('controller' => 'petrols', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display', 'home')); ?> </li>
	</ul>
</div>
