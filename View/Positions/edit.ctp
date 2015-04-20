<div class="positions form">
<?php echo $this->Form->create('Position'); ?>
	<fieldset>
		<legend><?php echo __('Editar Posicion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('position', array('label' => 'Posicion'));
		echo $this->Form->input('apppages_id',array('label' => 'Pagina'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Position.id')), null, __('Seguro que deseas borrar %s?', $this->Form->value('Position.position'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Posiciones'), array('action' => 'index')); ?></li>
	</ul>
</div>
