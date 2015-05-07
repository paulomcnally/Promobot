<?php
$response = array();
$response['new_business'] = array();
$response['businesses_has_categories'] = array();
foreach($new_business as $data){
	$data['Business']['logo'] = str_replace("business/", "", $data['Business']['logo']);
	if($data['Business']['facebook_info'] == null){
		$data['Business']['facebook_info'] = "";
	}
	if($data['Business']['descripcion'] == null)
		$data['Business']['descripcion'] = "";
	$images = array();
	foreach ($data['Image'] as $image){
		$img['id'] = $image['id'];
		$img['name'] = $image['name'];
		array_push($images, $img);
	}
	$data['Business']['images'] = $images; 	
	array_push($response['new_business'], $data['Business']);
	foreach($data['Category'] as $category){
		$object['businesses_id'] = $data['Business']['id'];
		$object['categories_id'] = $category['id'];
		array_push($response['businesses_has_categories'], $object);
	}
}
$response['business'] = array();
foreach($business as $data){
	$data['Business']['logo'] = str_replace("business/", "", $data['Business']['logo']);
	if($data['Business']['facebook_info'] == null){
		$data['Business']['facebook_info'] = "";
	}
	if($data['Business']['descripcion'] == null)
		$data['Business']['descripcion'] = "";
	$images = array();
	foreach ($data['Image'] as $image){
		$img['id'] = $image['id'];
		$img['name'] = $image['name'];	
		array_push($images, $img);
	}
	$data['Business']['images'] = $images;
	array_push($response['business'], $data['Business']);
}

$response['new_categories'] = array();
foreach($new_categories as $data){
	$data['Category']['image'] = str_replace("categories/", "", $data['Category']['image']);
	array_push($response["new_categories"],$data['Category']);
}
$response['categories'] = array();
foreach($categories as $data){
	$data['Category']['image'] = str_replace("categories/", "", $data['Category']['image']);
	array_push($response["categories"],$data['Category']);
}
$response['new_cities'] = array();
foreach($new_cities as $data){
	array_push($response["new_cities"],$data['City']);
}
$response['cities'] = array();
foreach($cities as $data){
	array_push($response["cities"],$data['City']);
}

$response['businesses_cities'] = array();
foreach($business_details as $data){
	$detail['businesses_id'] = $data['BusinessDetail']['businesses_id'];
	$detail['cities_id'] = $data['BusinessDetail']['cities_id'];
	array_push($response['businesses_cities'], $detail);
}

$response['details'] = array();
$detail = array();

foreach($business_details as $data){
	$detail['details'] = $data['BusinessDetail'];
	$phone_numbers = "";
	foreach ($data['PhoneNumber'] as $phoneNumber){
		$phone_numbers .= $phoneNumber['phone_number'].",";
	}
	$phone_numbers = substr_replace($phone_numbers ,"",-1);
	$detail['details']['phone_numbers'] = $phone_numbers;
	$detail['details']['lon'] = $detail['details']['long'];
	array_push($response['details'], $detail);
}

$this->log(json_encode($response),'debug');

echo json_encode($response);