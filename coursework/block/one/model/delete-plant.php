<?php
session_start();

require_once "api.php";
global $conn;

$pid = $_SESSION["plant_id"];

if (empty($pid)) {
    die();
}

echo deletePlant($pid);