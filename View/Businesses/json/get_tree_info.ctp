<?php
$treeInfo = array();
foreach($response as $data){
	$treeInfo[] = array(
			"data"  => array(
					"title"	=>	$data['name']
			),
			"attr"  => array("id" => $data['id'], "type" => $data['type']),
			"state" => "closed"
	);
}
echo json_encode($treeInfo);