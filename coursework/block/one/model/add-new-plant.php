<?php
include_once "api.php";

$cname = $_POST["cname"];
$sname = $_POST["sname"];
$desc = $_POST["desc"];

echo createPlant($cname,$sname,$desc);