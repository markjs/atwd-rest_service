<?php

$dom = new DOMDocument;

$response = $dom->createElement('response');
$response->setAttribute('timestamp', time());

$crimes = $dom->createElement('crimes');
$crimes->setAttribute('year', $date_range);

foreach ($values as $value) {
  $element = $dom->createElement($value['element']);
  if (strlen($value['id']) > 0) {
    $element->setAttribute('id', $value['id']);
  }
  $element->setAttribute('total', $total);

  $crimes->appendChild($element);
}

$response->appendChild($crimes);

$dom->appendChild($response);
$dom->formatOutput = true;
echo $dom->saveXML();
