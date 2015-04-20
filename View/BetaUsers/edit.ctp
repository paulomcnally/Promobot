<div class="betaUsers form">
<?php echo $this->Form->create('BetaUser',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Beta User'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BetaUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BetaUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Beta Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Device Types'), array('controller' => 'device_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device Types'), array('controller' => 'device_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
