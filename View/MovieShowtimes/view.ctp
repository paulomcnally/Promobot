<div class="movieShowtimes view">
<h2><?php  echo __('Cartelera'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($movieShowtime['MovieShowtime']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sala'); ?></dt>
		<dd>
			<?php echo h($movieShowtime['MovieShowtime']['sala']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora'); ?></dt>
		<dd>
			<?php echo h($movieShowtime['MovieShowtime']['hora']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Idioma'); ?></dt>
		<dd>
			<?php echo h($movieShowtime['MovieShowtime']['idioma']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dia'); ?></dt>
		<dd>
			<?php echo h($movieShowtime['MovieShowtime']['dia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cine'); ?></dt>
		<dd>
			<?php echo $this->Html->link($movieShowtime['MovieTheater']['name'], array('controller' => 'movie_theaters', 'action' => 'view', $movieShowtime['MovieTheater']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pelicula'); ?></dt>
		<dd>
			<?php echo $this->Html->link($movieShowtime['Movie']['name'], array('controller' => 'movies', 'action' => 'view', $movieShowtime['Movie']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Cartelera'), array('action' => 'edit', $movieShowtime['MovieShowtime']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Cartelera'), array('action' => 'delete', $movieShowtime['MovieShowtime']['id']), null, __('Are you sure you want to delete # %s?', $movieShowtime['MovieShowtime']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Carteleras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Cartelera'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cines'), array('controller' => 'movie_theaters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cine'), array('controller' => 'movie_theaters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Peliculas'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Pelicula'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
	</ul>
</div>
