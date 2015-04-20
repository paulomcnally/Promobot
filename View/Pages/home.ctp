<div class="index">
	<h2><?php echo __('Inicio'); ?></h2>
	<div>
		<?php echo $this->Html->image('sh_logo.jpg',array('alt' => 'Logo'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Negocios'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
	</ul>
</div>