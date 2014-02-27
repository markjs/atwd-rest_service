<?php

header('Content-Type: text/xml');

$dom = new DOMDocument;

$response = $dom->createElement('response');
$response->setAttribute('timestamp', time());

$crimes = $dom->createElement('crimes');
$crimes->setAttribute('year', $date_range);

$element = $dom->createElement('region');
$element->setAttribute('id', $region_slug);
$element->setAttribute('previous', $previous_total);
$element->setAttribute('total', $updated_total);

$crimes->appendChild($element);

$response->appendChild($crimes);

$dom->appendChild($response);
$dom->formatOutput = true;
echo $dom->saveXML();
