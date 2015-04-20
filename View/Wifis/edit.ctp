<div class="wifis form">
<?php echo $this->Form->create('Wifi'); ?>
	<fieldset>
		<legend><?php echo __('Editar Wifi'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lat');
		echo $this->Form->input('long');
		echo $this->Form->input('name');
		echo $this->Form->input('direccion');
		echo $this->Form->input('verificado');
		echo $this->Form->input('verificado_date');
		echo $this->Form->input('users_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Wifi.id')), null, __('Seguro que desea borrar # %s?', $this->Form->value('Wifi.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Wifis'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
