<div class="appMessages form">
<?php echo $this->Form->create('AppMessage'); ?>
	<fieldset>
		<legend><?php echo __('Add App Message'); ?></legend>
	<?php
		echo $this->Form->input('mensaje');
		echo $this->Form->input('url');
		echo $this->Form->input('is_update', array('legend' => 'Es update', 'type' => 'radio','options' => array('1' => 'Si', '0' => 'No'), 'default' => '0'));		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List App Messages'), array('action' => 'index')); ?></li>
	</ul>
</div>
