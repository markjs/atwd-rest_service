<?php

header('Content-Type: application/json');

$response = array();

# Cast time to string to match spec example
$response['timestamp'] = ''.time();

$crimes = array();
$crimes['year'] = $date_range;

foreach ($values as $value) {
  $item = array();

  if (!preg_match('/region|national/', $value['element'])) {
    $crimes[$value['element']] = array('total' => ''.$value['total']);
  } else {
    $item['id'] = ''.$value['id'];
    $item['total'] = ''.$value['total'];

    if (isset($crimes[$value['element']])) {
      $crimes[$value['element']][] = $item;
    } else {
      $crimes[$value['element']] = array($item);
    }
  }
}

$response['crimes'] = $crimes;
echo json_encode(array('response' => $response));
