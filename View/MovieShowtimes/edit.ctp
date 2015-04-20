<div class="movieShowtimes form">
<?php echo $this->Form->create('MovieShowtime'); ?>
	<fieldset>
		<legend><?php echo __('Editar Cartelera'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sala');
		echo $this->Form->input('hora');
		echo $this->Form->input('idioma');
		echo $this->Form->input('dia');
		echo $this->Form->input('movie_theaters_id');
		echo $this->Form->input('movies_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('MovieShowtime.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MovieShowtime.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Carteleras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cines'), array('controller' => 'movie_theaters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cine'), array('controller' => 'movie_theaters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Peliculas'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Pelicula'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
	</ul>
</div>
