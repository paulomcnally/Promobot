<div class="petrolPrices form">
<?php echo $this->Form->create('PetrolPrice'); ?>
	<fieldset>
		<legend><?php echo __('Editar Precio Gasolina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('precio');
		echo $this->Form->input('tendencia');
		echo $this->Form->input('tendencia_fecha' ,array('label' => 'Tendencia Semana'));
		echo $this->Form->input('petrol_categories_id');
		echo $this->Form->input('petrols_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('PetrolPrice.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PetrolPrice.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Precios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'petrol_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'petrol_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gasolineras'), array('controller' => 'petrols', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gasolinera'), array('controller' => 'petrols', 'action' => 'add')); ?> </li>
	</ul>
</div>
