<?php

header('Content-Type: text/json');

$response = array();

$response['timestamp'] = ''.time();

$crimes = array();
$crimes['year'] = $date_range;

#TODO: Transform slug into pretty title
$region = array();
$region['id'] = $region_slug;

$region['areas'] = array();

$region_total = 0;

foreach ($values as $value) {
  $item = array();

  $item['id'] = ''.$value['id'];
  $item['total'] = ''.$value['total'];

  $region['areas'][] = $item;

  $region_total += $value['total'];
}

$region['total'] = $region_total;

$crimes['region'] = $region;
$response['crimes'] = $crimes;
echo json_encode(array('response' => $response));
