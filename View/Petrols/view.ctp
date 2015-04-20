<div class="petrols view">
<h2><?php  echo __('Gasolinera'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($petrol['Petrol']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($petrol['Petrol']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo $this->Html->image($petrol['Petrol']['image'], array('alt' => $petrol['Petrol']['image'], 'style' => "width: 40px;")); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Gasolinera'), array('action' => 'edit', $petrol['Petrol']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Gasolinera'), array('action' => 'delete', $petrol['Petrol']['id']), null, __('Are you sure you want to delete # %s?', $petrol['Petrol']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gasolineras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gasolinera'), array('action' => 'add')); ?> </li>
	</ul>
</div>
