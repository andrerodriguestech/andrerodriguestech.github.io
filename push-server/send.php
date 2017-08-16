<?php

require "vendor/autoload.php";

use Minishlink\WebPush\WebPush;

$auth = array(
    "VAPID" => array(
        "subject" => "mailto:dibarbado@gmail.com", // can be a mailto: or your website address
        "publicKey" => "BOKxs6WUroYgU_akMSztq1RG_c3TmqLK1J8yOtfIfcwzSiK3JLyLF-svI9jsOtR-v_7kF048U5uY\ntDxH3mCwbQQ", // (recommended) uncompressed public key P-256 encoded in Base64-URL
        "privateKey" => "MBTzTO1zoru0f6wdSQyPDUHq1PnGcxo0jYaJkl1SE2k\n", // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
    ),
);

$webPush = new WebPush($auth);

$handle = fopen("endpoints.txt", "r") or die("Unable to open file!");

while (!feof($handle)) {
    $line = fgets($handle);
    if (strlen($line) > 0) {
        $client = json_decode($line);
        $webPush->sendNotification(
            $client->endpoint,
            $_POST['msg'], // optional (defaults null)
            $client->keys->p256dh, // optional (defaults null)
            $client->keys->auth // optional (defaults null)
        );
    }
}
fclose($handle);

$webPush->flush();

header("location: index.php");
