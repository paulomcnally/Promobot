<?php echo $this->Html->script(array('jquery','jquery.dataTables.min','business.details'));?>
<?php echo $this->Html->css('jquery.dataTables.css');?>
<div class="businessDetails index">
	<h2><?php echo __('Business Details'); ?></h2>
	<table cellpadding="0" cellspacing="0" id="details">
		<thead>
		<tr>
			<th>Id</th>
			<th>Creado</th>
			<th>Direcci&oacute;n</th>
			<th>Negocio</th>
			<th>Ciudad</th>
			<th class="actions">Acciones</th>
		</tr>
		</thead>
	<?php foreach ($businessDetails as $businessDetail): ?>
	<tr>
		<td><?php echo h($businessDetail['BusinessDetail']['id']); ?>&nbsp;</td>
		<td><?php echo h($businessDetail['BusinessDetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($businessDetail['BusinessDetail']['direccion']); ?>&nbsp;</td>
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
