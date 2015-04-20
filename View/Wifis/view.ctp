<div class="wifis view">
<h2><?php  echo __('Wifi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($wifi['Wifi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($wifi['Wifi']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Long'); ?></dt>
		<dd>
			<?php echo h($wifi['Wifi']['long']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($wifi['Wifi']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($wifi['Wifi']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verificado'); ?></dt>
		<dd>
			<?php echo h($wifi['Wifi']['verificado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verificado Date'); ?></dt>
		<dd>
			<?php echo h($wifi['Wifi']['verificado_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($wifi['Users']['id'], array('controller' => 'users', 'action' => 'view', $wifi['Users']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Wifi'), array('action' => 'edit', $wifi['Wifi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Wifi'), array('action' => 'delete', $wifi['Wifi']['id']), null, __('Seguro que desea borrar # %s?', $wifi['Wifi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Wifis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Wifi'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuarios'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
