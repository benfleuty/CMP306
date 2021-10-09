<?php
include "../model/connection.php";
global $conn;

session_start();

if (!isset($_POST["plant_id"]) || empty($_POST["plant_id"])) {
    //error
    die();
}

$_SESSION["plant_id"] = $_POST["plant_id"];

$sql = "SELECT * FROM CMP306BlockOnePlants WHERE id = " . $_POST["plant_id"] ;
$res = mysqli_query($conn, $sql)->fetch_assoc();

$plant_id = $res["id"];
$scientific_name = $res["scientific_name"];
$common_name = $res["common_name"];
$keep_location = $res["keep_location"];
$description = $res["description"];
$image = $res["image"];


$data = array(
    'scientific_name' => $scientific_name,
    'common_name' => $common_name,
    'keep_location' => $keep_location,
    'description' => $description,
    'image' => $image
);

echo json_encode($data,JSON_INVALID_UTF8_IGNORE);