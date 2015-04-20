<div class="movieTheaters form">
<?php echo $this->Form->create('MovieTheater'); ?>
	<fieldset>
		<legend><?php echo __('Editar Cine'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('movie_theater_brands_id', array('label' => 'Cine'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('MovieTheater.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MovieTheater.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cines'), array('action' => 'index')); ?></li>
	</ul>
</div>
