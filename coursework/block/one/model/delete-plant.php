<?php
session_start();

require_once "api.php";
global $conn;

$pid = $_POST["pid"];

if (empty($pid)) {
    die();
}

echo deletePlant($pid);