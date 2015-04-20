<div class="movieTheaters view">
<h2><?php  echo __('Cine'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($movieTheater['MovieTheater']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($movieTheater['MovieTheater']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Cine'), array('action' => 'edit', $movieTheater['MovieTheater']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $movieTheater['MovieTheater']['id']), null, __('Are you sure you want to delete # %s?', $movieTheater['MovieTheater']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cine'), array('action' => 'add')); ?> </li>
	</ul>
</div>
