<?php
session_start();

require_once "connection.php";
global $conn;

$pid = $_SESSION["plant_id"];

if (empty($pid)) {
    die();
}

$sql = "DELETE FROM CMP306BlockOnePlants WHERE id=" . $pid . ";";

$data = array();

if (mysqli_query($conn, $sql)) {
    $data = array('status' => 'success');
} else {
    $data = array('status' => 'error');
}

$data = json_encode($data);

echo $data;