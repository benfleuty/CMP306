<?php
include_once "api.php";

$cname = $_POST["cname"];
$sname = $_POST["sname"];
$desc = $_POST["desc"];
$link = $_POST["link"];

echo createPlant($cname,$sname,$desc,$link);