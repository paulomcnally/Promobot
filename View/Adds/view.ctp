<div class="adds view">
<h2><?php  echo __('Publicidad'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($add['Add']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($add['Add']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($add['Add']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hits'); ?></dt>
		<dd>
			<?php echo h($add['Add']['hits']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($add['Add']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo $this->Html->image($add['Add']['imagen'], array('alt' => $add['Add']['imagen'], 'style' => "width: 200px;")); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ultimo Display'); ?></dt>
		<dd>
			<?php echo h($add['Add']['ultimo_display']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($add['Add']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($add['Add']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($add['User']['full_name'], array('controller' => 'users', 'action' => 'view', $add['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posiciones'); ?></dt>
		<dd>
			<?php 
				foreach($add['Position'] as $position)
					echo h($position['position'])." / "; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Publicidad'), array('action' => 'edit', $add['Add']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Publicidad'), array('action' => 'delete', $add['Add']['id']), null, __('Are you sure you want to delete # %s?', $add['Add']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Publicidad'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Publicidad'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Negocios'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Negocio'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
