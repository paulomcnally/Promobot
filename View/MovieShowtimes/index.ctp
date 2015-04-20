<?php echo $this->Html->script(array('jquery','jquery.dataTables.min','showtimes.index'));?>
<?php echo $this->Html->css('jquery.dataTables.css');?>
<div class="movieShowtimes index">
	<h2><?php echo __('Carteleras'); ?></h2>
	<table cellpadding="0" cellspacing="0" id="showtimes_datatable">
	<thead>
	<tr>
			<th>id</th>
			<th>sala</th>
			<th>hora</th>
			<th>idioma</th>
			<th>d&iacute;a</th>
			<th>Cine</th>
			<th>Pelicula</th>
			<th class="actions">Acciones</th>
	</tr>
	</thead>
	<?php foreach ($movieShowtimes as $movieShowtime): ?>
	<tr>
		<td><?php echo h($movieShowtime['MovieShowtime']['id']); ?>&nbsp;</td>
		<td><?php echo h($movieShowtime['MovieShowtime']['sala']); ?>&nbsp;</td>
		<td><?php echo h($movieShowtime['MovieShowtime']['hora']); ?>&nbsp;</td>
		<td><?php echo h($movieShowtime['MovieShowtime']['idioma']); ?>&nbsp;</td>
		<td><?php echo h($movieShowtime['MovieShowtime']['dia']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($movieShowtime['MovieTheater']['name'], array('controller' => 'movie_theaters', 'action' => 'view', $movieShowtime['MovieTheater']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($movieShowtime['Movie']['name'], array('controller' => 'movies', 'action' => 'view', $movieShowtime['Movie']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $movieShowtime['MovieShowtime']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $movieShowtime['MovieShowtime']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $movieShowtime['MovieShowtime']['id']), null, __('Are you sure you want to delete # %s?', $movieShowtime['MovieShowtime']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Cartelera'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Marcas de Cines'), array('controller' => 'movie_theater_brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cines'), array('controller' => 'movie_theaters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cine'), array('controller' => 'movie_theaters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Peliculas'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Pelicula'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display', 'home')); ?> </li>
	</ul>
</div>
