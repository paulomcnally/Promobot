<div class="moneyExchangeRates index">
	<h2><?php echo __('Tasa de Cambio'); ?></h2>
	<?php echo $this->Form->postLink(__('Limpiar cambios pasados'), array('action' => 'delete', 0), null, __('Are you sure you want to delete # %s?', 0)); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cambio'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($moneyExchangeRates as $moneyExchangeRate): ?>
	<tr>
		<td><?php echo h($moneyExchangeRate['MoneyExchangeRate']['id']); ?>&nbsp;</td>
		<td><?php echo h($moneyExchangeRate['MoneyExchangeRate']['cambio']); ?>&nbsp;</td>
		<td><?php echo h($moneyExchangeRate['MoneyExchangeRate']['date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $moneyExchangeRate['MoneyExchangeRate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $moneyExchangeRate['MoneyExchangeRate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $moneyExchangeRate['MoneyExchangeRate']['id']), null, __('Are you sure you want to delete # %s?', $moneyExchangeRate['MoneyExchangeRate']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Cambio'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Principal'), array('controller' => 'pages', 'action' => 'display', 'home')); ?> </li>
	</ul>
</div>
