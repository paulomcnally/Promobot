<div class="emergencyPhones view">
<h2><?php  echo __('Numero de Emergencia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emergencyPhone['EmergencyPhone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($emergencyPhone['EmergencyPhone']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergencies'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emergencyPhone['Emergency']['name'], array('controller' => 'emergencies', 'action' => 'view', $emergencyPhone['Emergency']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Num. de Emergencia'), array('action' => 'edit', $emergencyPhone['EmergencyPhone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Numero de Emergencia'), array('action' => 'delete', $emergencyPhone['EmergencyPhone']['id']), null, __('Are you sure you want to delete # %s?', $emergencyPhone['EmergencyPhone']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Numero de Emergencia'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Num. de Emergencia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Emergencias'), array('controller' => 'emergencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Emergencia'), array('controller' => 'emergencies', 'action' => 'add')); ?> </li>
	</ul>
</div>
