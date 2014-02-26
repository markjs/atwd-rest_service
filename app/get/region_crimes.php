<?php

/* header('Content-Type: text/xml'); */

#TODO: Handle this somewhere better
$exploded_path = explode('/', $REQUEST_PATH);
$request_format = end($exploded_path);
$date_range = $exploded_path[count($exploded_path)-3];
$region_slug = $exploded_path[count($exploded_path)-2];

$xml = simplexml_load_file('data/recorded_crime.xml');

$region = $xml->xpath("/crimes/region[@id='$region_slug']");
$region = $region[0];

$areas = $region->xpath('area');

$values = array();

foreach ($areas as $area) {
  $values[] = array('id' => $area->name, 'total' => $area->total_recorded_crime->including_fraud);
}

if (file_exists("app/views/region_crimes.$request_format.php")) {
  require "app/views/region_crimes.$request_format.php";
} else {
  #TODO: Real error handling here
  echo "error";
}
