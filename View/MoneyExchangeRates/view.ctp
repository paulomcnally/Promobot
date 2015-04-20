<div class="moneyExchangeRates view">
<h2><?php  echo __('Cambio'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($moneyExchangeRate['MoneyExchangeRate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cambio'); ?></dt>
		<dd>
			<?php echo h($moneyExchangeRate['MoneyExchangeRate']['cambio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($moneyExchangeRate['MoneyExchangeRate']['date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Cambio'), array('action' => 'edit', $moneyExchangeRate['MoneyExchangeRate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Cambio'), array('action' => 'delete', $moneyExchangeRate['MoneyExchangeRate']['id']), null, __('Are you sure you want to delete # %s?', $moneyExchangeRate['MoneyExchangeRate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cambios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Cambio'), array('action' => 'add')); ?> </li>
	</ul>
</div>
