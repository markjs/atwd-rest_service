<?php

header('Content-Type: text/xml');

$dom = new DOMDocument;

$response = $dom->createElement('response');
$response->setAttribute('timestamp', time());

$crimes = $dom->createElement('crimes');
$crimes->setAttribute('year', $date_range);

$region = $dom->createElement('region');
#TODO: Transform slug into pretty title
$region->setAttribute('id', $region_slug);

$region_total = 0;

foreach ($values as $value) {
  $element = $dom->createElement('area');
  $element->setAttribute('id', $value['id']);
  $element->setAttribute('total', $value['total']);

  $region_total += $value['total'];

  $region->appendChild($element);
}

$region->setAttribute('total', $region_total);
$crimes->appendChild($region);

$response->appendChild($crimes);

$dom->appendChild($response);
$dom->formatOutput = true;
echo $dom->saveXML();
