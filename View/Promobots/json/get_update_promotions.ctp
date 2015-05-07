<?php
    $response = array();
    $response['newpromos'] = array();
    $response['promos'] = array();
      array_push($response['newpromos'], $new_promos);
      array_push($response['promos'], $promos);
    echo json_encode($response);

