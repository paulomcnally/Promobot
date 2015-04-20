<?php //echo $this->Html->css('default/style.min');
echo $this->Html->css('proton/style.min');?>
<?php echo $this->Html->script(array('jquery','json.Permissions','jstree.min','Permissions.tree'));?>

<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Editar Grupo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	<!--</fieldset>-->

        <div id="contenedor">
         <h3>Permisos sobre Acciones:</h3>
            <div id="permisos">
            </div>
            <div id="arrows" >
                <div class="larrow">
                    <h3>Habilitar</h3>
    		    <img id="add" src="/img/arrows/netvibes.png">
                </div>
                <div class="rarrow">
                    <h3>Deshabilitar</h3>
                    <img id="remove" src="/img/arrows/close.png">
                </div>
            </div>  
            <div class="selectcat">
                <h3>Acciones Habilitadas</h3>
                <span id='sp'></span>
                <?php
                      echo $this->Form->select('info',$info,['multiple' => true,'style' => 'height: 400px;']);
                ?>
            </div>
        </div>	
       </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar Grupo'), array('action' => 'delete', $this->Form->value('Group.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Group.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Grupos'), array('action' => 'index')); ?></li>
	</ul>
</div>
