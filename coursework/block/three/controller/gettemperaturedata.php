<?php

include_once '../model/api.php';

if (!isset($_POST['pin']) || !is_numeric($_POST['pin'])) {
    echo json_encode(["status" => "bad input"]);
    exit;
}

$pin = $_POST['pin'];

echo get_temperatures_lastX($pin, 10);