<?php
$ads = array();
foreach($response as $ad){
	$a = array();
	$a['position'] = $ad[0]['p']['position'];
	$a['image'] = $ad[0]['Add']['imagen'];
	$a['url'] = $ad[0]['Add']['url'];
	array_push($ads, $a);
}
echo json_encode($ads);