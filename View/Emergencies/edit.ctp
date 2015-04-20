<div class="emergencies form">
<?php echo $this->Form->create('Emergency', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Emergency'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('phone',array('label' => 'Telefono'));
		echo $this->Form->input('image', array('type' => 'file', 'label' => 'Imagen'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Emergency.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Emergency.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Emergencies'), array('action' => 'index')); ?></li>
	</ul>
</div>
