<div class="businessDetails view">
<h2><?php  echo __('Detalles Negocio'); ?></h2>
	<dl>
		<dt><?php echo __('Id');?></dt>
		<dd>
			<?php echo h($businessDetail['BusinessDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($businessDetail['BusinessDetail']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($businessDetail['BusinessDetail']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Long'); ?></dt>
		<dd>
			<?php echo h($businessDetail['BusinessDetail']['long']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Negocio'); ?></dt>
		<dd>
			<?php echo $this->Html->link($businessDetail['Business']['name'], array('controller' => 'businesses', 'action' => 'view', $businessDetail['Business']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo $this->Html->link($businessDetail['City']['name'], array('controller' => 'cities', 'action' => 'view', $businessDetail['City']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Detalles'), array('action' => 'edit', $businessDetail['BusinessDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $businessDetail['BusinessDetail']['id']), null, __('Are you sure you want to delete # %s?', $businessDetail['BusinessDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Detalles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Detalle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Negocios'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Negocio'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciudades'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Ciudad'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
