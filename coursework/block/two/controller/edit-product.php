<?php
session_start();
include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";

if (!isset($_POST["id"], $_POST["name"], $_POST["price"], $_POST["desc"])) {
    die;
}
$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$desc = $_POST["desc"];

echo updateProduct($id, $name, $price, $desc);