<?php

$encoded = file_get_contents('php://input');

$message = json_decode($encoded, true)[0];

if (!isset($message['pin'], $message['value']) || !is_numeric($message['pin']) || !is_numeric($message['value'])) {
    httpResponse(400, 'Malformed data:');
}

include_once "../model/api.php";
$pin = $message['pin'];
$value = $message['value'];

$response = null;

if ($pin === '5' || $pin === '7') {
    $response = log_led_imp($pin, $value);
} elseif ($pin === '8' || $pin === '9') {
    $response = log_temperature_imp($pin, $value);
} else {
    httpResponse(400, "Malformed data");
}

$output = "";

$response = json_decode($response, true);

if (isset($response['status'], $response['insert_status']) && $response['status'] === 'success' && $response['insert_status'] === 'success') {
    $output = "success";
} else {
    httpResponse(500, "Error processing data on the server!");
}

echo $output;

function httpError($code, $message)
{
    http_response_code($code);
    echo $message;
    exit;
}