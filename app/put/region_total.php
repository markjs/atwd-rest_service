<?php

$xml = simplexml_load_file('data/recorded_crime.xml');

#TODO: Error handle if not found

$region = $xml->xpath("/crimes/region[@id='$region_slug']");
$region = $region[0];

$previous_total = 0;

foreach ($region->children() as $area) {
  $previous_total += $area->total_recorded_crime->including_fraud;
}

# Note: Persisting the new region value would happen here, but the spec mentions
# nothing about that and extra totals would need to be calculated so it's being
# counted as unnecessary now.

if (file_exists("app/views/region_total.$request_format.php")) {
  require "app/views/region_total.$request_format.php";
} else {
  print_404("Template file not found");
}
