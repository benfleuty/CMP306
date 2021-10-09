<?php

session_start();

require_once "connection.php";
global $conn;

$newDescription = $_POST["text"];
$id = $_SESSION["plant_id"];

$newDescription = filter_var($newDescription);

$sql = "UPDATE CMP306BlockOnePlants SET description = '{$newDescription}' WHERE id = {$id}";

$data = array();

if (mysqli_query($conn,$sql)){
    $res = array('status' => 'success');
}else{
    $res = array('status' => 'fail');
}

$data = array_merge($data,$res);

$data = json_encode($data) ;

echo $data;