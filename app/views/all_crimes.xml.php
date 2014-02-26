<?php

$dom = new DOMDocument;

$response = $dom->createElement('response');
$response->setAttribute('timestamp', time());



$dom->appendChild($response);
echo $dom->saveXML();
