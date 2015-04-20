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
		<li><?php echo $this->Html->link(__('Emergencias'), array('controller' => 'emergencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Cambio'), array('controller' => 'moneyExchangeRates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Cartelera'), array('controller' => 'movieShowtimes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Gasolineras'), array('controller' => 'petrolPrices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Taxis'), array('controller' => 'taxis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Wifi Spots'), array('controller' => 'wifis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Publicidad'), array('controller' => 'adds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Usuarios Beta'), array('controller' => 'betaUsers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Mensajes'), array('controller' => 'appMessages', 'action' => 'index')); ?> </li>
	</ul>
</div>