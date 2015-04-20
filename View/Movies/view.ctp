<div class="movies view">
<h2><?php  echo __('Pelicula'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre(Doblado)'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['nombre2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duracion'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['duracion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clasificacion'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['clasificacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo $this->Html->image($movie['Movie']['imagen'], array('alt' => $movie['Movie']['imagen'], 'style' => "width: 40px;")); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trama'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['trama']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trailer'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['trailer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desde'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hasta'); ?></dt>
		<dd>
			<?php echo h($movie['Movie']['to']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Pelicula'), array('action' => 'edit', $movie['Movie']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Pelicula'), array('action' => 'delete', $movie['Movie']['id']), null, __('Seguro que desea borrar # %s?', $movie['Movie']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Peliculas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Pelicula'), array('action' => 'add')); ?> </li>
	</ul>
</div>
