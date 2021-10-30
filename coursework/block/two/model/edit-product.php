<?php
session_start();
include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";

if (!isset($_POST["id"], $_POST["name"], $_POST["price"], $_POST["desc"])) {
    die;
}
$id = mysqli_real_escape_string(($_POST["id"]));
$name = mysqli_real_escape_string($_POST["name"]);
$price = mysqli_real_escape_string($_POST["price"]);
$desc = mysqli_real_escape_string($_POST["desc"]);


echo updateProduct($id, $name, $price, $desc);