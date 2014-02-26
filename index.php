<?php

$BASE_PATH = '/atwd/';
$REQUEST_PATH = substr($_SERVER['REQUEST_URI'], strlen($BASE_PATH));

#TODO: Real regex here
if (preg_match('/^crimes\//', $REQUEST_PATH)) {
  require 'app/get/all_crimes.php';
}
