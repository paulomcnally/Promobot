<div class="promotions form">
<?php echo $this->Form->create('Promotion',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Promotion'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('businesses_id',array('type' => 'hidden','value' => $id));
		echo $this->Form->input('image', array('type' => 'file'));
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('active', array('type' => 'radio','options' => array('1' => 'Si', '0' => 'No'), 'default' => '0'));
		echo $this->Form->input('display_number');
		//echo $this->Form->input('PromotionDetail');
                echo $this->Form->input('PromotionDetail', array(
				'label' => 'Sucursales(Ctr+Seleccion multiple)',
				'type' => 'select',
				'multiple' => true,
				'style' => 'height: 350px;'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Businesses'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Details'), array('controller' => 'business_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion Detail'), array('controller' => 'business_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
