<?php

header('Content-Type: text/xml');

$csv_file = fopen('recorded_crime.csv', 'r');

$dom = new DOMDocument;

$crimes = $dom->createElement('crimes');
$dom->appendChild($crimes);










print_r($dom->saveXML());

?>
