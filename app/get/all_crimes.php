<?php

$xml = simplexml_load_file('data/recorded_crime.xml');

$values = array();

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
  }


  $values[] = array('element' => $element_name, 'id' => $region_name, 'total' => $total);
}

foreach ($values as $value) { ?>
  <<?php echo $value['element'] ?> id="<?php echo $value['id'] ?>" total="<?php echo $value['total'] ?>" />
<?php
}
