<div class="promotions form">
<?php echo $this->Form->create('Promotion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Promotion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('businesses_id');
		echo $this->Form->input('image');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('active');
		echo $this->Form->input('display_number');
		echo $this->Form->input('PromotionDetail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Promotion.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Promotion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Businesses'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Details'), array('controller' => 'business_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion Detail'), array('controller' => 'business_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
