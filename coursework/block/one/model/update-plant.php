<?php

require_once "api.php";

$id = $_POST["pid"];
$newCommon = $_POST["cname"];
$newScientific = $_POST["sname"];
$newDescription = $_POST["desc"];
$newLink = $_POST["link"];

$cleanId = filter_var($id);
$cleanCommon = filter_var($newCommon);
$cleanScientific = filter_var($newScientific);
$cleanDescription = filter_var($newDescription);
$cleanLink = filter_var($newLink);

echo updatePlant($cleanId,$cleanCommon,$cleanScientific,$cleanDescription,$cleanLink);