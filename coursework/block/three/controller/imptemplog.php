<?php

$encoded = file_get_contents('php://input');

$message = json_decode($encoded, true);

if (!isset($message['pin'], $message['value']) || !is_numeric($message['pin']) || !is_numeric($message['value'])) {
    httpResponse(400, 'Malformed data:');
}

include_once '../model/api.php';
$pin = $message['pin'];
$value = $message['value'];

$response = null;

if ($pin === '8' || $pin === '9') {
    $response = log_temperature_imp($pin, $value);
} else {
    httpResponse(400, 'Incorrect data');
}

$response = json_decode($response, true);

if (isset($response['status'], $response['insert_status']) && $response['status'] === 'success' && $response['insert_status'] === 'success') {
    httpResponse(200, 'success');
} else {
    httpResponse(500, 'Error processing data on the server!');
}