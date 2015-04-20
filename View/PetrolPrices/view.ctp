<div class="petrolPrices view">
<h2><?php  echo __('Precio Gasolina'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($petrolPrice['PetrolPrice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($petrolPrice['PetrolPrice']['precio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Categorias Gasolina'); ?></dt>
		<dd>
			<?php echo $this->Html->link($petrolPrice['PetrolCategories']['id'], array('controller' => 'petrol_categories', 'action' => 'view', $petrolPrice['PetrolCategories']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gasolinera'); ?></dt>
		<dd>
			<?php echo $this->Html->link($petrolPrice['Petrols']['id'], array('controller' => 'petrols', 'action' => 'view', $petrolPrice['Petrols']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Precio Gasolina'), array('action' => 'edit', $petrolPrice['PetrolPrice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Precio'), array('action' => 'delete', $petrolPrice['PetrolPrice']['id']), null, __('Are you sure you want to delete # %s?', $petrolPrice['PetrolPrice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Precio'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Precio'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'petrol_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'petrol_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gasolinera'), array('controller' => 'petrols', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gasolinera'), array('controller' => 'petrols', 'action' => 'add')); ?> </li>
	</ul>
</div>
