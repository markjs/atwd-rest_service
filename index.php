<?php

require 'functions.php';

$BASE_PATH = '/~mj7-smith/atwd/';
$REQUEST_PATH = substr($_SERVER['REQUEST_URI'], strlen($BASE_PATH));

$exploded_path = explode('/', $REQUEST_PATH);
$request_format = end($exploded_path);

if (preg_match('/^crimes\/[0-9,-]+\/(xml|json)$/', $REQUEST_PATH)){
  $date_range = $exploded_path[count($exploded_path)-2];

  require 'app/get/all_crimes.php';
  return;
}

if (preg_match('/^crimes\/[0-9,-]+\/[a-z,_]+\/(xml|json)$/', $REQUEST_PATH)) {
  $date_range = $exploded_path[count($exploded_path)-3];
  $region_slug = $exploded_path[count($exploded_path)-2];

  require 'app/get/region_crimes.php';
  return;
}

if (preg_match('/^crimes\/[0-9,-]+\/put\/[a-z,_]+:[0-9]+\/(xml|json)$/', $REQUEST_PATH)) {
  $date_range = $exploded_path[count($exploded_path)-4];
  $split_query = explode(':', $exploded_path[count($exploded_path)-2]);
  $region_slug = $split_query[0];
  $updated_total = $split_query[1];

  require 'app/put/region_total.php';
  return;
}

# If we've got this far, none of the routes have matched so we'll throw a 501 (as per spec)

$dom = new DOMDocument;

$response = $dom->createElement('response');
$response->setAttribute('timestamp', time());

$error = $dom->createElement('error');
$error->setAttribute('code', '501');
$error->setAttribute('desc', "This route does not match anything");

$response->appendChild($error);

$dom->appendChild($response);
$dom->formatOutput = true;

header('Content-Type: text/xml');
http_response_code(501);
echo $dom->saveXML();
