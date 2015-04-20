<?php echo $this->Html->script(array('jquery','business'));?>
<div class="businessDetails form">
<?php echo $this->Form->create('BusinessDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Business Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('direccion');
		echo "Agregar Telefono: ".$this->Html->link($this->Html->image('style/add-button-md.png', array('alt' => 'Agegar Telefono', 'style' => "width: 40px;")),'#',array('style' =>'vertical-align: bottom; padding-left: 10px;', 'onclick' => 'addPhoneNumber();','escape' => false));
		?>
		<div id='phone-container'>
		<?php
		$counter = 0;
		foreach($phones as $phone){
			echo '<div class="input text" id="phone-'.$counter.'"><label for="BusinessDetailTelefono">Telefono</label><input type="text" value="'.$phone['PhoneNumber']['phone_number'].'" id="BusinessDetailTelefono'.$counter.'" maxlength="45" style="width: 90%" name="data[PhoneNumber]['.$counter.'][phone_number]"><a onclick="removePhoneNumber(this);" style="vertical-align: bottom; padding-left: 10px;" href="#"><img style="width: 40px;" alt="Remover Telefono" src="/cake/img/style/minus-button-md.png"></a></div>';
		}
		?>
		</div>
	<?php
		echo $this->Form->input('lat');
		echo $this->Form->input('long');
		echo $this->Form->input('businesses_id',array('label' => 'Negocio'));
		echo $this->Form->input('cities_id', array('label' => 'Ciudad'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('BusinessDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BusinessDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Detalles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Negocios'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Negocio'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Ciudades'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Ciudad'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>