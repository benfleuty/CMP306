<?php

require_once "api.php";

session_start();

$newDescription = $_POST["text"];
$id = $_SESSION["plant_id"];

$newDescription = filter_var($newDescription);

echo editPlant($id,$newDescription);