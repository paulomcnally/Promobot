<div class="petrolCategories form">
<?php echo $this->Form->create('PetrolCategory'); ?>
	<fieldset>
		<legend><?php echo __('Editar Categorias Gasolina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('PetrolCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PetrolCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('action' => 'index')); ?></li>
	</ul>
</div>
