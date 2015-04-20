<div class="taxis view">
<h2><?php  echo __('Taxi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Movistar'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Claro'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['numero_claro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placa'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['placa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Intrama'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['intrama']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($taxi['City']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['marca']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['modelo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooperativa'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['cooperativa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<?php echo $this->Html->image($taxi['Taxi']['img'], array('alt' => $taxi['Taxi']['img'], 'style' => "width: 40px;")); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Taxi'), array('action' => 'edit', $taxi['Taxi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Taxi'), array('action' => 'delete', $taxi['Taxi']['id']), null, __('Are you sure you want to delete # %s?', $taxi['Taxi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Taxis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Taxi'), array('action' => 'add')); ?> </li>
	</ul>
</div>
