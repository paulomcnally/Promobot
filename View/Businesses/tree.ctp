<?php echo $this->Html->script(array('jquery','tree'));?>
<script type="text/javascript" src="/cake/jstree/jquery.jstree.js"></script>
<div class="businesses view">
	<h2><?php echo __('Estructura'); ?></h2>
	<div id="tree" class='tree'></div>
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
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display')); ?> </li>
	</ul>
</div>