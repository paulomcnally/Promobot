<div class="emergencyPhones form">
<?php echo $this->Form->create('EmergencyPhone'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Numero de Emergencia'); ?></legend>
	<?php
		echo $this->Form->input('numero');
		echo $this->Form->input('emergencies_id', array('label' => 'Emergencia'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Numeros'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Emergencias'), array('controller' => 'emergencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Emergencia'), array('controller' => 'emergencies', 'action' => 'add')); ?> </li>
	</ul>
</div>
