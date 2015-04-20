<?php
   $rjson = array();
   $cont = 0;  

   if( $_GET["id"] === "#" ) { //si es el inicio solo cargar nodos raiz

   	foreach($acos_Permissions as $acos){

   			if($acos['acos']['parent_id'] == '1'){ //evitar que muestre principal
   			   $rjson[$cont++] = array('id' => $acos['acos']['id'],'parent' => '#','text' => $acos['acos']['alias'],"children" => true);
   			}

     } 

   }
   elseif( $_GET["id"] !== "#" ) {  //de otra forma devolver nodos hoja
   	   	foreach($acos_Permissions as $acos){

   	   			if($acos['acos']['parent_id'] === $_GET['id']){
   						$rjson[$cont++] = array('id' => $acos['acos']['id'],'parent' => $acos['acos']['parent_id'],'text' => $acos['acos']['alias']);
   					  }

     	} 
   }


  echo json_encode($rjson); //devolver cadena json en formato entendible por jstree
