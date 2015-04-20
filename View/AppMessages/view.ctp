<div class="appMessages view">
<h2><?php  echo __('App Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($appMessage['AppMessage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mensaje'); ?></dt>
		<dd>
			<?php echo h($appMessage['AppMessage']['mensaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($appMessage['AppMessage']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($appMessage['AppMessage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($appMessage['AppMessage']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Update'); ?></dt>
		<dd>
			<?php echo h($appMessage['AppMessage']['is_update']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit App Message'), array('action' => 'edit', $appMessage['AppMessage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete App Message'), array('action' => 'delete', $appMessage['AppMessage']['id']), null, __('Are you sure you want to delete # %s?', $appMessage['AppMessage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List App Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New App Message'), array('action' => 'add')); ?> </li>
	</ul>
</div>
