<?php echo $this->Html->css('default/style.min');?>
<?php echo $this->Html->script(array('jquery','facebookgraph','business','json_procesador','jstree.min','knockout','arbol.manipulador'));?>
<div class="businesses form">
<?php echo $this->Form->create('Business', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Negocio'); ?></legend>
	<?php
		echo $this->Form->input('facebook', array('onBlur' => 'getBusinessInfo()'));
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('logo', array('type' => 'file'));
		echo $this->Html->image($business['Business']['logo'], array('alt' => $business['Business']['logo'], 'style' => "width: 100px;")); 
		echo '<br/>';
		echo "Agregar Imagen: ".$this->Html->link($this->Html->image('style/add-button-md.png', array('alt' => 'Agegar Imagen', 'style' => "width: 40px;")),'#/',array('style' =>'vertical-align: bottom; padding-left: 10px;', 'onclick' => 'addBusinessImage();','escape' => false));
		?>
		<div id='image-container'>
		<?php 
			foreach($images as $image){
				echo '<div><label>Image</label><img src="/img/'.$image['Image']['name'].'" width="50px;" height="50px"><a onclick="deleteBusinessImage('.$image['Image']['id'].',this);" style="vertical-align: bottom; padding-left: 10px;" href="#/"><img style="width: 40px;" alt="Remover Imagen" src="/img/style/minus-button-md.png"></a></div>';
			}
		?>
		</div>
		
	<?php
		echo $this->Form->input('descripcion');
		echo $this->Form->input('phone', array('label' => 'Telefono'));
		echo $this->Form->input('web');
		echo $this->Form->input('email');
		echo $this->Form->input('wifi', array('type' => 'radio','options' => array('1' => 'Si', '0' => 'No')));
		echo $this->Form->input('isPro', array('legend' => 'Pro', 'type' => 'radio','options' => array('1' => 'Si', '0' => 'No')));
		echo $this->Form->input('games', array('legend' => 'Juegos', 'type' => 'radio','options' => array('1' => 'Si', '0' => 'No')));
	?>
    <h3>Categorias</h3>

    <div id="contenedor">
    	<div id="categorias">
        </div>
    	<div id="arrows" >
            <div class="larrow">
                <h3>A&ntilde;adir</h3>
    		    <img id="add" src="/img/arrows/netvibes.png">
            </div>
            <div class="rarrow">
                <h3>Quitar</h3>
            <img id="remove" src="/img/arrows/close.png">
            </div>
        </div>  
        <div class="selectcat">
          <h3>Categorias seleccionadas</h3>
            <span id='sp'></span>
           <?php
                
                echo $this->Form->input('Category.Category', array(
				'label' => 'Categorias (Ctr+Seleccion multiple)',
				'type' => 'select',
				'multiple' => true,
				'style' => 'height: 350px;'
		        ));
                
           ?>
        </div>
    </div>	
    <?php    
		echo $this->Form->input('users_id');
		
		echo "Agregar Detalle: ".$this->Html->link($this->Html->image('style/add-button-md.png', array('alt' => 'Agegar Detalle', 'style' => "width: 40px;")),'#/',array('style' =>'vertical-align: bottom; padding-left: 10px;', 'onclick' => 'addBusinessDetail();','escape' => false));
	?>
		<div id='detail-container'>
		<?php 
			$d = 0;
			foreach($details as $detail){
				$values = $detail['BusinessDetail'];
				echo '<div class="input text" id="detail-'.$d.'">
						<input type="hidden" id="BusinessDetailId'.$d.'" value="'.$values['id'].'" name="data[BusinessDetail]['.$d.'][id]">
						<label for="BusinessDetail">Detalle</label>
						<div class="input text">
							<label for="BusinessDetailDireccion">Direccion</label>
							<input name="data[BusinessDetail]['.$d.'][direccion]" maxlength="100" id="BusinessDetailDireccion'.$d.'" type="text" value="'.$values['direccion'].'">
						</div>
						Agregar Telefono: 
						<a href="#/" style="vertical-align: bottom; padding-left: 10px;" id="AddPhone-'.$d.'" onclick="addPhoneNumber('.$d.');">
							<img src="/img/style/add-button-md.png" alt="Agegar Telefono" style="width: 40px;">
						</a>
						<div id="phone-container-'.$d.'">';
				$p = 0;
				foreach($detail['PhoneNumber'] as $phoneNumber){
					echo '<div class="input text" id="phone-'.$d.'-'.$p.'">
							<input type="hidden" id="BusinessDetailPhoneId-'.$d.'-'.$p.'" value="'.$phoneNumber['id'].'" name="data[BusinessDetail]['.$d.'][PhoneNumber]['.$p.'][id]">
							<label for="BusinessDetailTelefono">Telefono</label>
							<input id="BusinessDetailTelefono-'.$d.'-'.$p.'" maxlength="45" style="width: 90%" name="data[BusinessDetail]['.$d.'][PhoneNumber]['.$p.'][phone_number]" type="text" value="'.$phoneNumber['phone_number'].'">
							<a class="RemovePhone-'.$p.'" onclick="deletePhoneNumber('.$phoneNumber['id'].',this,'.$d.');" style="vertical-align: bottom; padding-left: 10px;" href="#/">
								<img style="width: 40px;" alt="Remover Telefono" src="/img/style/minus-button-md.png">
							</a>
						</div>';
					$p++;
				}	
				echo '	</div>
						<div class="input number">
							<label for="BusinessDetailLat">Lat</label>
							<input name="data[BusinessDetail]['.$d.'][lat]" step="any" id="BusinessDetailLat'.$d.'" type="number" value="'.$values['lat'].'">
						</div>
						<div class="input number">
							<label for="BusinessDetailLong">Long</label>
							<input name="data[BusinessDetail]['.$d.'][long]" step="any" id="BusinessDetailLong'.$d.'" type="number" value="'.$values['long'].'">
						</div>
						<div class="input select required">
							<label for="BusinessDetailCitiesId">Ciudad</label>
							<select name="data[BusinessDetail]['.$d.'][cities_id]" id="BusinessDetailCitiesId'.$d.'">';
				foreach($cities as $city){
					$cityValues = $city['City'];
					$selected = '';
					if($cityValues['id'] == $values['cities_id'])
						$selected = 'selected=selected';
					echo '<option value="'.$cityValues['id'].'" '.$selected.'>'.$cityValues['name'].'</option>';
				}	
				echo '		</select>
						</div>
						<a onclick="deleteBusinessDetail('.$values['id'].',this);" style="vertical-align: bottom; padding-left: 10px;" href="#/">
							<img style="width: 40px;" alt="Remover Detalle" src="/img/style/minus-button-md.png">
						</a>
					</div>';
				$d++;
			}
		?>
		
		</div>
	<?php	
		echo $this->Form->input('facebookId', array('type' => 'hidden'));
		echo $this->Form->input('facebook_info', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Business.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Business.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Negocios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categorias'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoria'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>