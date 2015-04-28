<?php echo $this->Html->css('default/style.min');?>
<?php echo $this->Html->script(array('jquery','facebookgraph','business','json_procesador','jstree.min','knockout','arbol.manipulador'));?>
<div class="businesses form">
<?php echo $this->Form->create('Business', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Negocio'); ?></legend>
	<?php
		echo $this->Form->input('facebook', array('onBlur' => 'getBusinessInfo()'));
		echo $this->Form->input('name', array('label' => 'Nombre'));
		echo $this->Form->input('logo', array('type' => 'file'));
		echo "Agregar Imagen: ".$this->Html->link($this->Html->image('style/add-button-md.png', array('alt' => 'Agegar Imagen', 'style' => "width: 40px;")),'#/',array('style' =>'vertical-align: bottom; padding-left: 10px;', 'onclick' => 'addBusinessImage();','escape' => false));
		?>
		<div id='image-container'></div>
	<?php
	//	echo $this->Form->input('image', array('type' => 'file', 'label' => 'Imagen'));
		echo $this->Form->input('descripcion');
		echo $this->Form->input('phone', array('label' => 'Telefono'));
		echo $this->Form->input('web');
		echo $this->Form->input('email');
		echo $this->Form->input('wifi', array('type' => 'radio','options' => array('1' => 'Si', '0' => 'No'), 'default' => '0'));
		echo $this->Form->input('isPro', array('legend' => 'Pro', 'type' => 'radio','options' => array('1' => 'Si', '0' => 'No'), 'default' => '0'));
		echo $this->Form->input('games', array('legend' => 'Juegos', 'type' => 'radio','options' => array('1' => 'Si', '0' => 'No'), 'default' => '0'));

/*		echo $this->Form->input('Business.Category', array(
				'label' => 'Categorias (Ctr+Seleccion multiple)',
				'type' => 'select',
				'multiple' => true,
				'style' => 'height: 350px;'
		));*/
             
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
        <select id="CategoryCategory" style="height: 350px;" multiple="multiple" name="data[Category][Category][]"></select>
        </div>
    </div>	
        
        <?php
		echo $this->Form->input('users_id',array('label' => 'Usuario'));
		
		echo "Agregar Detalle: ".$this->Html->link($this->Html->image('style/add-button-md.png', array('alt' => 'Agegar Detalle', 'style' => "width: 40px;")),'#/',array('style' =>'vertical-align: bottom; padding-left: 10px;', 'onclick' => 'addBusinessDetail();','escape' => false));

	?>
		<div id='detail-container'></div>
                
        <!--test promotions code -->
       
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

		<li><?php echo $this->Html->link(__('Listar Negocio'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Categoria'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Categoria'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuario'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
