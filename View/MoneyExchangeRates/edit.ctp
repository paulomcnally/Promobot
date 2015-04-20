<div class="moneyExchangeRates form">
<?php echo $this->Form->create('MoneyExchangeRate'); ?>
	<fieldset>
		<legend><?php echo __('Editar Cambio'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cambio');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('MoneyExchangeRate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MoneyExchangeRate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cambio'), array('action' => 'index')); ?></li>
	</ul>
</div>
