<div class="betaUsers form">
<?php echo $this->Form->create('BetaUser', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Beta User'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('active',array('label' => 'Activo','type' => 'radio','options' => array('1' => 'Si', '0' => 'No')));
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('device_identifier',array('label' => 'Identificador del dispositivo'));
		echo $this->Form->input('device_types_id',array('label' => 'Tipo'));
		echo $this->Form->input('testimony',array('label' => 'Testimonio'));
		echo $this->Form->input('testimony_img',array('label' => 'Imagen de testimonio','type' => 'file'));
		echo $this->Form->input('show_testimony',array('label' => 'Mostrar Testimonio','type' => 'radio','options' => array('1' => 'Si', '0' => 'No')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Beta Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
