<?php
include_once "../model/api.php";

session_start();

if (!isset($_POST["plant_id"]) || empty($_POST["plant_id"])) {
    //error
    die();
}

$_SESSION["plant_id"] = $_POST["plant_id"];

echo getPlant($_POST["plant_id"]);