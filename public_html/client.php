<?php 

$url = 'http://localhost/API_REST/public_html/api';
$class = '/user';
$param  = '';

$response = file_get_contents($url. $class . $param);
//echo $response;

//transfoproma o json e marray
$response = json_decode($response,1);

var_dump($response['data'][0]['email']);