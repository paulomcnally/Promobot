<div class="movieTheaterBrands form">
<?php echo $this->Form->create('MovieTheaterBrand', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('image', array('type' => 'file'));
		echo $this->Form->input('phone');
		echo $this->Form->input('positions_id', array('label' => 'Posicion Ad'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>		
		<li><?php echo $this->Html->link(__('Listar'), array('action' => 'index')); ?></li>
	</ul>
</div>
