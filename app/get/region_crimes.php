<?php

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
  print_404("Template file not found");
}
