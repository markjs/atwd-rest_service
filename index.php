<?php

$BASE_PATH = '/atwd/';
$REQUEST_PATH = substr($_SERVER['REQUEST_URI'], strlen($BASE_PATH));



echo $REQUEST_PATH;
