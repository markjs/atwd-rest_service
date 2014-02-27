<?php

require 'functions.php';

$BASE_PATH = '/atwd/';
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
  require 'app/put/region_total.php';
  return;
}
