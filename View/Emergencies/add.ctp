<div class="emergencies form">
<?php echo $this->Form->create('Emergency', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Nueva Emergencia'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Nombre'));
		echo $this->Form->input('phone',array('label' => 'Telefono'));
		echo $this->Form->input('image', array('type' => 'file', 'label' => 'Imagen'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Emergencias'), array('action' => 'index')); ?></li>
	</ul>
</div>
