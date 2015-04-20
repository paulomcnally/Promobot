<div class="petrols form">
<?php echo $this->Form->create('Petrol', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Gasolinera'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('image', array('type' => 'file', 'label' => 'Imagen'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Petrol.id')), null, __('Seguro que desea borrar # %s?', $this->Form->value('Petrol.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Gasolineras'), array('action' => 'index')); ?></li>
	</ul>
</div>
