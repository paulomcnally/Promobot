<div class="movieShowtimes form">
<?php echo $this->Form->create('MovieShowtime'); ?>
	<fieldset>
		<legend><?php echo __('Nueva Cartelera'); ?></legend>
	<?php
		echo $this->Form->input('sala');
		echo $this->Form->input('hora');
		echo $this->Form->input('idioma');
		echo $this->Form->input('dia');
		echo $this->Form->input('movie_theaters_id', array('label' => 'Cine'));
		echo $this->Form->input('movies_id', array('label' => 'Pelicula'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Carteleras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cines'), array('controller' => 'movie_theaters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cine'), array('controller' => 'movie_theaters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Peliculas'), array('controller' => 'movies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Pelicula'), array('controller' => 'movies', 'action' => 'add')); ?> </li>
	</ul>
</div>
