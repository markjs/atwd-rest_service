<?php

$xml = simplexml_load_file('data/recorded_crime.xml');

$values = array();
$england_total = 0;

foreach ($xml->children() as $region) {
  $total = 0;

  foreach ($region->children() as $area) {
    $total += $area->total_recorded_crime->including_fraud;
  }

  $region_name = $region->name;


  switch ($region_name) {
    case 'Wales':
      $element_name = 'wales';
      $region_name = null;
      break;
    case 'British Transport Police':
    case 'Action Fraud':
      $element_name = 'national';
      break;
    default:
      $element_name = 'region';
      $england_total += $total;
  }


  $values[] = array('element' => $element_name, 'id' => $region_name, 'total' => $total);
}

$values[] = array('element' => 'england', 'id' => '', 'total' => $england_total);

#TODO: Order output values?

if (file_exists("app/views/all_crimes.$request_format.php")) {
  require "app/views/all_crimes.$request_format.php";
} else {
  #TODO: Real error handling here
  echo "error";
}
