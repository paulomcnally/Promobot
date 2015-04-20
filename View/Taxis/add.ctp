<div class="taxis form">
<?php echo $this->Form->create('Taxi', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Taxi'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('nombre');
		echo $this->Form->input('numero', array('label' => 'Num. Movistar'));
		echo $this->Form->input('numero_claro',array('label' => 'Num. Claro'));
		echo $this->Form->input('cities_id', array('label' => 'Ciudad'));
		echo $this->Form->input('placa');
		echo $this->Form->input('intrama');
		echo $this->Form->input('marca');
		echo $this->Form->input('modelo');
		echo $this->Form->input('color');
		echo $this->Form->input('cooperativa');
		echo $this->Form->input('img', array('type' => 'file','label' => 'Foto'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Taxis'), array('action' => 'index')); ?></li>
	</ul>
</div>
