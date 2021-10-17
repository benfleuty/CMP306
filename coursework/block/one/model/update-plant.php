<?php

require_once "api.php";

session_start();

$newDescription = $_POST["text"];
$newLink = $_POST["link"];
$id = $_SESSION["plant_id"];

$cleanDescription = filter_var($newDescription);
$cleanLink = filter_var($newLink);

echo updatePlant($id,$cleanDescription,$cleanLink);