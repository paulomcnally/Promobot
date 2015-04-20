<?php
$response['movies'] = array();
foreach($movies as $movie){
	$movieObject['id'] = $movie['Movie']['id'];
	$movieObject['name'] = $movie['Movie']['name'];
	$movieObject['subtitle'] = $movie['Movie']['nombre2'];
	$movieObject['director'] = $movie['Movie']['direccion'];
	$movieObject['time'] = $movie['Movie']['duracion'];
	$movieObject['rated'] = $movie['Movie']['clasificacion'];
	$movieObject['rating'] = $movie['Movie']['rating'];
	$movieObject['poster'] = str_replace("movies/", "", $movie['Movie']['imagen']);
	$movieObject['sinopsis'] = $movie['Movie']['trama'];
	$movieObject['trailer'] = $movie['Movie']['trailer'];
	$movieObject['genre'] = $movie['Movie']['genero'];
	$movieObject['from'] = $movie['Movie']['from'];
	$movieObject['to'] = $movie['Movie']['to'];
	$movieObject['showTimes'] = array();
	foreach($movie['showtime'] as $showtime){
		if(count($showtime['info']) > 0){
			$showtimeObject['cine'] = $showtime['cine'];
			$showtimeObject['cine_marca'] = $showtime['theater_brand_id'];
			$showtimeObject['cartelera'] = array();
			foreach($showtime['info'] as $sala){
				$cartelera = array();
				$cartelera['hora'] = $sala['MovieShowtime']['hora'];
				$cartelera['idioma'] = $sala['MovieShowtime']['idioma'];
				$cartelera['dia'] = $sala['MovieShowtime']['dia'];
				$cartelera['sala'] = $sala['MovieShowtime']['sala'];
				array_push($showtimeObject['cartelera'], $cartelera);
			}
			array_push($movieObject['showTimes'], $showtimeObject);
		}
	}
	array_push($response['movies'], $movieObject);
}

$response['theater_brands'] = array();
foreach ($movieTheaterBrands as $object){
	$theaterObject['id'] = $object['MovieTheaterBrand']['id'];
	$theaterObject['name'] = $object['MovieTheaterBrand']['name'];
	$theaterObject['phone'] = $object['MovieTheaterBrand']['phone'];
	$theaterObject['image'] = str_replace("movies/", "", $object['MovieTheaterBrand']['image']);	
	$theaterObject['position'] = $object['Position']['position'];	
	array_push($response['theater_brands'],$theaterObject);
}

echo json_encode($response);