<div class="petrolCategories view">
<h2><?php  echo __('Categoria Gasolina'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($petrolCategory['PetrolCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($petrolCategory['PetrolCategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Categoria'), array('action' => 'edit', $petrolCategory['PetrolCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Categoria'), array('action' => 'delete', $petrolCategory['PetrolCategory']['id']), null, __('Are you sure you want to delete # %s?', $petrolCategory['PetrolCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('action' => 'add')); ?> </li>
	</ul>
</div>
