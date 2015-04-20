<?php echo $this->Html->script(array('jquery','jquery.dataTables.min','adds'));?>
<?php echo $this->Html->css('jquery.dataTables.css');?>
<div class="adds index">
	<h2><?php echo __('Publicidad'); ?></h2>
	<table cellpadding="0" cellspacing="0" id="adds_table">
		<thead>
		<tr>
			<th>Nombre</th>
			<th>Descripci&oacute;n</th>
			<th>Displays</th>
			<th>&Uacute;ltimo Display</th>
			<th>Creado</th>
			<th>Modificado</th>
			<th>Usuario</th>
			<th class="actions">Acciones</th>
		</tr>
		</thead>
	<?php foreach ($adds as $add): ?>
	<tr>
		<td><?php echo h($add['Add']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($add['Add']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($add['Add']['display_no']); ?>&nbsp;</td>
		<td><?php echo h($add['Add']['ultimo_display']); ?>&nbsp;</td>
		<td><?php echo h($add['Add']['created']); ?>&nbsp;</td>
		<td><?php echo h($add['Add']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($add['User']['full_name'], array('controller' => 'users', 'action' => 'view', $add['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $add['Add']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $add['Add']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $add['Add']['id']), null, __('Are you sure you want to delete # %s?', $add['Add']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Publicidad'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Negocios'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Negocio'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display', 'home')); ?> </li>
	</ul>
</div>
