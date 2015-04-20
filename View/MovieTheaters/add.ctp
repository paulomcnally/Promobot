<div class="movieTheaters form">
<?php echo $this->Form->create('MovieTheater'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Cine'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('movie_theater_brands_id', array('label' => 'Cine'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Cines'), array('action' => 'index')); ?></li>
	</ul>
</div>
