<?php
include "../model/connection.php";
global $conn;

if (!isset($_POST["plant_id"]) || empty($_POST["plant_id"])) {
    //error
    die();
}

$sql = "SELECT * FROM CMP306BlockOnePlants WHERE id = " . $_POST["plant_id"] ;
$res = mysqli_query($conn, $sql)->fetch_assoc();

$id = $res["id"];
$scientific_name = $res["scientific_name"];
$common_name = $res["common_name"];
$keep_location = $res["keep_location"];
$description = $res["description"];
$image = $res["image"];


$data = array('id' => $id,
    'scientific_name' => $scientific_name,
    'common_name' => $common_name,
    'keep_location' => $keep_location,
    'description' => $description,
    'image' => $image
);

echo json_encode($data,JSON_INVALID_UTF8_IGNORE);