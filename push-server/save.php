<?php

$endpoint = $_POST["endpoint"];

header('Access-Control-Allow-Origin: *');

$handle = fopen("endpoints.txt", "a") or die("Unable to open file!");

print_r(fwrite($handle, $endpoint . "\n"));

fclose($handle);

header("location: endpoints.php");
