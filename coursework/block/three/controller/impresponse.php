<?php

$message = file_get_contents('php://input');

$message = json_decode($message, true)[0];
$output = "";

if ($message['pin'] === '5') {
    $output .= 'red state set to';
}elseif ($message['pin'] === '7') {
    $output .= 'green state set to';
}elseif ($message['pin'] === '8') {
    $output .= 'internal temp is ';
}elseif ($message['pin'] === '9') {
    $output .= 'external temp is';
}

$output .= $message["value"];

echo $output;