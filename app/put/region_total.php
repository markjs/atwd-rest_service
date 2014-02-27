<?php

$xml = simplexml_load_file('data/recorded_crime.xml');

$region = $xml->xpath("/crimes/region[@id='$region_slug']");
$region = $region[0];

$previous_total = 0;

foreach ($region->children() as $area) {
  $previous_total += $area->total_recorded_crime->including_fraud;
}

if (file_exists("app/views/region_total.$request_format.php")) {
  require "app/views/region_total.$request_format.php";
} else {
  #TODO: Real error handling here
  echo "error";
}
