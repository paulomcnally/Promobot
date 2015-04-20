<?php echo $this->Html->script(array('jquery','map'));?>
 <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu27_Q8mYNRjGbVyMJdreiS7z8FmFO4sw&sensor=false">
    </script>

<div class="petrols index">
	<h2><?php echo __('Gasolineras(mapa)'); ?></h2>
	<div style="height: 600px; width: 100%;" id="map-canvas"> </div>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Gasolinera'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Gasolineras'), array('controller' => 'petrolPrices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Mapa Gasolinera'), array('action' => 'showMap')); ?></li>
	</ul>
</div>