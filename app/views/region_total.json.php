<?php

header('Content-Type: text/json');

$response = array();

# Cast time to string to match spec example
$response['timestamp'] = ''.time();

$crimes = array();
$crimes['year'] = $date_range;

$region = array();

$region['id'] = $region_slug;
$region['previous'] = ''.$previous_total;
$region['total'] = ''.$updated_total;

$crimes['region'] = $region;

$response['crimes'] = $crimes;
echo json_encode(array('response' => $response));
