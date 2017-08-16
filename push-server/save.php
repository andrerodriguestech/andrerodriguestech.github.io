<?php

header('Access-Control-Allow-Origin: *');

$handle = fopen("endpoints.txt", "a") or die("Unable to open file!");

fwrite($handle, $_POST["endpoint"] . "\n");

fclose($handle);
