<div class="businesses index">
	<fieldset>
		<legend><?php echo __('Exportar'); ?></legend>
		<dl>
		<dt><?php echo __('Exportados'); ?></dt>
		<dd>
			<?php echo h(count($business_list)); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exportar a'); ?></dt>
		<dd><?php echo $this->Html->link(__('Excel'), array('controller' => 'businesses', 'action' => 'excel')); ?></dd>
	</dl>
	</fieldset>
	
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Negocio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categoria'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Detalles'), array('controller' => 'businessDetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Estructura'), array('action' => 'tree')); ?> </li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>