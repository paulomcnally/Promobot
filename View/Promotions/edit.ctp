<?php echo $this->Html->script(array('jquery','QRgenerator'));?>
<div class="promotions form">
<?php echo $this->Form->create('Promotion',array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Promotion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('businesses_id',array('type' => 'hidden'));
		echo $this->Form->input('image',array('type' => 'file'));
                echo $this->Html->image($currentPromo['Promotion']['image'], array('alt' => $currentPromo['Promotion']['image'], 'style' => "width: 100px;"));
                
                if(!$QRempty){
                    echo '<br/>';
                    echo '<p>Codigo QR</p>';
                    echo '<div id="divImage">';
                    echo $this->Html->image($image, array('alt' => 'image/QR', 'style' => "width: 100px;", 'id' => 'QRImage'));
                    echo '</div>';
                    echo '&nbsp;';
                    echo '<br/>';
                    echo '<p><button id = "genbutton" type = "button" onclick="cambiarQR('. $id .')">cambiar QR</button></p>';
                    echo '<br/>';
                }
                else {
                    echo '<br/>';
                    echo '<div id="divImage">';
                    echo '<img id="QRImage" src=/img/promotions/qrhere.png alt="Codigo Qr a generar aqui">';
                    echo '</div>';
                    echo $this->Form->button('Generar QR', array('type' => 'button','onclick' => "cambiarQR( $id )",'id' => 'genbutton'));
                    echo '<br/>';
                }
                
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Promotion.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Promotion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Businesses'), array('controller' => 'businesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Businesses'), array('controller' => 'businesses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Details'), array('controller' => 'business_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion Detail'), array('controller' => 'business_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
