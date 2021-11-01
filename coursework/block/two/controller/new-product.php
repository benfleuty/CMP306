<?php
session_start();
include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";

if (!isset($_POST["name"], $_POST["price"], $_POST["desc"])) {
    die;
}
$name = $_POST["name"];
$price = $_POST["price"];
$desc = $_POST["desc"];

echo createProduct($name, $price, $desc);