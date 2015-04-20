<div class="moneyExchangeRates form">
<?php echo $this->Form->create('MoneyExchangeRate',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Cambios'); ?></legend>
	<?php
		echo $this->Form->input('cambio');
		echo $this->Form->input('date');
		echo $this->Form->input('excel_file', array('type' => 'file','lable' => 'Archivo Excel'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listar Cambios'), array('action' => 'index')); ?></li>
	</ul>
</div>
