<?php
$response= array();
foreach($moneyExchange as $exchange){
	$exchangeObject['date'] = date('Y-m-d',strtotime($exchange['MoneyExchangeRate']['date']));
	$exchangeObject['exchange'] = $exchange['MoneyExchangeRate']['cambio'];
	array_push($response,$exchangeObject);
}
//$this->log(json_encode($response),'debug');
echo json_encode($response);