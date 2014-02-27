<?php

$BASE_PATH = '/atwd/';
$REQUEST_PATH = substr($_SERVER['REQUEST_URI'], strlen($BASE_PATH));


if (preg_match('/^crimes\/[0-9,-]+\/(xml|json)$/', $REQUEST_PATH)){
  require 'app/get/all_crimes.php';
  return;
}

if (preg_match('/^crimes\/[0-9,-]+\/[a-z,_]+\/(xml|json)$/', $REQUEST_PATH)) {
  require 'app/get/region_crimes.php';
  return;
}
