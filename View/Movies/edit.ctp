<?php echo $this->Html->script(array('jquery','movies'));?>
<div class="movies form">
<?php echo $this->Form->create('Movie', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Pelicula'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('nombre2');
		echo $this->Form->input('direccion');
		echo $this->Form->input('duracion');
		echo $this->Form->input('clasificacion');
		echo $this->Form->input('genero');
		echo $this->Form->input('rating');
		echo $this->Form->input('imagen', array('type' => 'file'));
		echo $this->Form->input('trama');
		echo $this->Form->input('trailer');
		echo $this->Form->input('from', array('label' => 'Publicada desde'));
		echo $this->Form->input('to', array('label' => 'Hasta'));
	?>
	<div id='showtime-container'>
	<?php
		$counter = 0;
		foreach($showtimes as $showtime){
			echo '<div id="showtime_container-'.$counter.'">
					<div class="input text">
						<label for="MovieShowtimeSala">Sala</label>
						<input type="text" id="MovieShowtimeSala'.$counter.'" maxlength="45" name="data[Showtimes]['.$counter.'][sala]" value="'.$showtime['Showtimes']['sala'].'">
					</div>
					<div class="input text">
						<label for="MovieShowtimeHora">Hora</label>
						<input type="text" id="MovieShowtimeHora'.$counter.'" maxlength="100" name="data[Showtimes]['.$counter.'][hora]" value="'.$showtime['Showtimes']['hora'].'">
					</div>
					<div class="input text">
						<label for="MovieShowtimeIdioma">Idioma</label>
						<input type="text" id="MovieShowtimeIdioma'.$counter.'" maxlength="45" name="data[Showtimes]['.$counter.'][idioma]" value="'.$showtime['Showtimes']['idioma'].'">
					</div>
					<div class="input text">
						<label for="MovieShowtimeDia">Dia</label>
						<input type="text" id="MovieShowtimeDia'.$counter.'" maxlength="100" name="data[Showtimes]['.$counter.'][dia]" value="'.$showtime['Showtimes']['dia'].'">
					</div>
					<div class="input select required">
						<label for="MovieShowtimeMovieTheatersId">Cine</label>
						<select id="MovieShowtimeMovieTheatersId'.$counter.'" name="data[Showtimes]['.$counter.'][movie_theaters_id]">';
						foreach($theaters as $theater){
							$selected = '';
							if($showtime['MovieTheater']['id'] == $theater['MovieTheater']['id'])
								$selected = 'selected=selected';
							echo '<option value="'.$theater['MovieTheater']['id'].'" '.$selected.'>'.$theater['MovieTheater']['name'].'</option>';
						}
			echo '		</select>
					</div>
					<a href="#!" style="vertical-align: bottom; padding-left: 10px;" onclick="removeShowtime(this);">
						<img src="/cake/img/style/minus-button-md.png" alt="Remover Telefono" style="width: 40px;">
					</a>
				</div>';
			$counter++;
		}
		?>
		</div>
		<?php echo $this->Html->link($this->Html->image('style/add-button-md.png', array('title' =>'Agregar Cartelera', 'alt' => 'Agegar Cartelera', 'style' => "width: 40px;")),'#!',array('style' =>'vertical-align: bottom; padding-left: 10px;', 'onclick' => 'addShowtime();','escape' => false))
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Movie.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Movie.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Peliculas'), array('action' => 'index')); ?></li>
	</ul>
</div>
