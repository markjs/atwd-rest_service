<?php

$xml = simplexml_load_file('data/recorded_crime.xml');

$values = array();

foreach ($xml->children() as $region) {
  $region_name = $region->name;

  $total = 0;

  foreach ($region->children() as $area) {
    $total += $area->total_recorded_crime->including_fraud;
  }

  $element_name = 'region';

  $values[] = array('element' => $element_name, 'id' => $region_name, 'total' => $total);
}

foreach ($values as $value) { ?>
  <<?php echo $value['element'] ?> id="<?php echo $value['id'] ?>" total="<?php echo $value['total'] ?>">
<?php
}
