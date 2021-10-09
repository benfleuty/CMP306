<?php

require_once "connection.php";
global $conn;

$clearTableQuery = "DELETE FROM CMP306BlockOnePlants";
$fillTableQuery = "INSERT INTO CMP306BlockOnePlants SELECT * FROM cmp306week1plants";

$sql = $clearTableQuery;
$data = array();

if (mysqli_query($conn, $sql)) {
    // good delete
    $sql = $fillTableQuery;
    $res = array('drop_status' => 'success');
} else {
    // delete fail
    $res = array('drop_status' => 'fail');
}

$data = array_merge($data, $res);

if ($sql == $fillTableQuery && mysqli_query($conn, $sql)) {
    // good insert
    $res = array('fill_status' => 'success');
    $data = array_merge($data, $res);
}
$data = json_encode($data);
echo $data;