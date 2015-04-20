<div class="betaUsers view">
<h2><?php  echo __('Beta User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($betaUser['BetaUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($betaUser['BetaUser']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($betaUser['BetaUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($betaUser['BetaUser']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($betaUser['BetaUser']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Identifier'); ?></dt>
		<dd>
			<?php echo h($betaUser['BetaUser']['device_identifier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Types'); ?></dt>
		<dd>
			<?php echo h($betaUser['DeviceType']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Testimony'); ?></dt>
		<dd>
			<?php echo h($betaUser['BetaUser']['testimony']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Testimony Img'); ?></dt>
		<dd>
			<?php echo $this->Html->image($betaUser['BetaUser']['testimony_img'], array('alt' => $betaUser['BetaUser']['testimony_img'], 'style' => "width: 40px;")); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Show Testimony'); ?></dt>
		<dd>
			<?php echo h($betaUser['BetaUser']['show_testimony']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Beta User'), array('action' => 'edit', $betaUser['BetaUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Beta User'), array('action' => 'delete', $betaUser['BetaUser']['id']), null, __('Are you sure you want to delete # %s?', $betaUser['BetaUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Beta Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Beta User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
