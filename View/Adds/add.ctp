<div class="adds form">
<?php echo $this->Form->create('Add', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Nueva Publicidad'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('url');
		echo $this->Form->input('imagen', array('type' => 'file', 'label' => 'Imagen'));
		echo $this->Form->input('users_id');
		echo $this->Form->input('Position.Position', array(
				'label' => 'Posicion (Ctr+Seleccion multiple)',
				'type' => 'select',
				'multiple' => true,
				'style' => 'height: 350px;'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Publicidad'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
