<?php
/**
 * Definicion del elemento menu
 * @param array 
 * 
 *  Estructura del array
 *  	array('controllers' => array(
 *  		'users' => array(
 *  			'name' => 'users',
 *  			'actions' => array(
 *  				array('action'=>'add','text' => 'Agregar Usuario'),
 *  				array('action'=>'index','text' => 'Listar Usuarios')
 *  				)
 *  			)
 *  		)
 *  	)
 */
$menu = "<div class='actions'>
	<h3>Menu</h3>
	<ul>";
//Por cada controlador crear un menu
foreach($controllers as $controller):
	//Si hay acciones definidas crear un menu por cada accion
	if(isset($controller['actions'])){
		foreach($controller['actions'] as $action):
			$menu .= "<li>".$this->Html->link(__($action['text']), array('controller' => $controller['name'], 'action' => $action['action']))."</li>";
		endforeach;
	}else{
		//Acciones de listar y agregar por cada controlador si no hay acciones definidas
		$menu .= "<li>".$this->Html->link(__("Listar ".$controller), array('controller' => $controller, 'action' => 'index'))."</li>";
		$menu .= "<li>".$this->Html->link(__("Nuevo ".$controller), array('controller' => $controller, 'action' => 'add'))."</li>";
	}
endforeach;	
		
$menu .="	</ul>
</div>";
//Print Menu
echo $menu;