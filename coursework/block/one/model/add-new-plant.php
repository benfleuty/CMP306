<?php
include_once "api.php";

$cname = $_POST["cname"];
$sname = $_POST["sname"];
$desc = $_POST["desc"];
$link = $_POST["link"];

$clean_cname = htmlspecialchars($cname);
$clean_sname = htmlspecialchars($sname);
$clean_desc = htmlspecialchars($desc);
$clean_link = htmlspecialchars($link);

echo createPlant($clean_cname,$clean_sname,$clean_desc,$clean_link);