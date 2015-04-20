<?php
$response = array();
foreach($petrols as $petrol){
	foreach($petrol['Prices'] as $price){
		$priceObject['price'] = $price['precio'];
		$priceObject['tendencia'] = $price['tendencia'];
		$priceObject['tendencia_fecha'] = $price['tendencia_fecha'];
		$priceObject['category'] = $price['PetrolCategory']['name'];
		array_push($response, $priceObject);
	}
}
//$this->log(json_encode($response),'debug');
echo json_encode($response);