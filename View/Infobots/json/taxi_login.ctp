<?php
$response = array();
$response['login'] = $login;
$response['taxi'] = $result['Taxi'];
$response['taxi']['img'] = str_replace("taxi/", "", $response['taxi']['img']);
echo json_encode($response);