<div class="businesses view">
<h2><?php  echo __('Negocio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($business['Business']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($business['Business']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo $this->Html->image($business['Business']['logo'], array('alt' => $business['Business']['logo'], 'style' => "width: 40px;")); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo $this->Html->image($business['Business']['image'], array('alt' => $business['Business']['image'], 'style' => "width: 40px;")); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($business['Business']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($business['Business']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook'); ?></dt>
		<dd>
			<?php echo h($business['Business']['facebook']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wifi'); ?></dt>
		<dd>
			<?php echo h($business['Business']['wifi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Juegos'); ?></dt>
		<dd>
			<?php echo h($business['Business']['games']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categorias'); ?></dt>
		<dd>
			<?php 
				foreach($business['Category'] as $category)
					echo $this->Html->link($category['name'], array('controller' => 'categories', 'action' => 'view', $category['id']))." / "; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($business['User']['full_name'], array('controller' => 'users', 'action' => 'view', $business['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Negocio'), array('action' => 'edit', $business['Business']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Negocio'), array('action' => 'delete', $business['Business']['id']), null, __('Are you sure you want to delete # %s?', $business['Business']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Negocios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Negocio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
