<div class="emergencies view">
<h2><?php  echo __('Emergencia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emergency['Emergency']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($emergency['Emergency']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($emergency['Emergency']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo $this->Html->image($emergency['Emergency']['image'], array('alt' => $emergency['Emergency']['image'], 'style' => "width: 40px;")); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Emergencia'), array('action' => 'edit', $emergency['Emergency']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Emergencia'), array('action' => 'delete', $emergency['Emergency']['id']), null, __('Are you sure you want to delete # %s?', $emergency['Emergency']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Emergencias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Emergencia'), array('action' => 'add')); ?> </li>
	</ul>
</div>
