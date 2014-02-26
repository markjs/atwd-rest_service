<?php

header('Content-Type: text/json');

$response = array();

# Cast time to string to match spec example
$response['timestamp'] = ''.time();

$crimes = array();
$crimes['year'] = $date_range;

foreach ($values as $value) {
  $item = array();

  if (isset($value['id']) && strlen($value['id']) > 0) {
    $item['id'] = ''.$value['id'];
  }

  if (isset($value['total']) && strlen($value['total']) > 0) {
    $item['total'] = ''.$value['total'];
  }

  if (isset($crimes[$value['element']])) {
    $crimes[$value['element']][] = $item;
  } else {
    $crimes[$value['element']] = array($item);
  }
}





$response['crimes'] = $crimes;
echo json_encode(array('response' => $response));
