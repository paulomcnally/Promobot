<div class="petrols form">
<?php echo $this->Form->create('Petrol', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Nueva Gasolinera'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('image', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Gasolineras'), array('action' => 'index')); ?></li>
	</ul>
</div>
