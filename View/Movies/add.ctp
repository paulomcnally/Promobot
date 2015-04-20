<?php echo $this->Html->script(array('jquery','movies'));?>
<div class="movies form">
<?php echo $this->Form->create('Movie', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Nueva Pelicula'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('nombre2',  array('label' => 'Nombre(Doblado)'));
		echo $this->Form->input('direccion');
		echo $this->Form->input('duracion');
		echo $this->Form->input('genero');
		echo $this->Form->input('clasificacion');
		echo $this->Form->input('rating');
		echo $this->Form->input('imagen', array('type' => 'file'));
		echo $this->Form->input('trama');
		echo $this->Form->input('trailer');
		echo $this->Form->input('from', array('label' => 'Publicada desde'));
		echo $this->Form->input('to', array('label' => 'Hasta'));
	?>
	<div id='showtime-container'></div>
	<?php 
		echo $this->Html->link($this->Html->image('style/add-button-md.png', array('title' =>'Agregar Cartelera', 'alt' => 'Agegar Cartelera', 'style' => "width: 40px;")),'#!',array('style' =>'vertical-align: bottom; padding-left: 10px;', 'onclick' => 'addShowtime();','escape' => false))
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Peliculas'), array('action' => 'index')); ?></li>
	</ul>
</div>
