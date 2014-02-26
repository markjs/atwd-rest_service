<?php

$dom = new DOMDocument;

$response = $dom->createElement('response');
$response->setAttribute('timestamp', time());

foreach ($values as $value) {
  $element = $dom->createElement($value['element']);
  if (strlen($value['id']) > 0) {
    $element->setAttribute('id', $value['id']);
  }
  $element->setAttribute('total', $total);

  $response->appendChild($element);
}

$dom->appendChild($response);
$dom->formatOutput = true;
echo $dom->saveXML();
