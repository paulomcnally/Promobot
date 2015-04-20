<div class="appPages view">
<h2><?php  echo __('App Page'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($appPage['AppPage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($appPage['AppPage']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit App Page'), array('action' => 'edit', $appPage['AppPage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete App Page'), array('action' => 'delete', $appPage['AppPage']['id']), null, __('Are you sure you want to delete # %s?', $appPage['AppPage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List App Pages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New App Page'), array('action' => 'add')); ?> </li>
	</ul>
</div>
