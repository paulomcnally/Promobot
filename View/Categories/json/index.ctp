<?php
   $rjson = array();
   $cont = 0;  

   if( $_GET["id"] === "#" ) { //si es el inicio solo cargar nodos raiz

   	foreach($categories as $category){

   		if($category['Parent']['id'] == 1){
   			if($category['Category']['name'] === "Principal"){ //evitar que muestre principal
   				continue;
   			}
   			$rjson[$cont++] = array('id' => $category['Category']['name'],'parent' => '#','text' => $category['Category']['name'],"children" => true);
   			 
   		}
     } 

   }
   elseif( $_GET["id"] !== "#" ) {  //de otra forma devolver nodos hoja
   	   	foreach($categories as $category){

   	   			if(($category['Parent']['name'] === $_GET['id'])&&($category['Parent']['name'] !== $category['Category']['name'])){
   						$rjson[$cont++] = array('id' => $category['Category']['name'],'parent' => $category['Parent']['name'],'text' => $category['Category']['name'],'eid' => $category['Category']['id']);
   					  }

     	} 
   }
  echo json_encode($rjson); //devolver cadena json en formato entendible por jstree
?>
