<?php
session_start();
unset($_SESSION["user_id"]);

require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
if (!isset($_POST["uname"], $_POST["pword"]) || empty($_POST["uname"])) {
    die();
}

$uname = $_POST["uname"];
$pword = $_POST["pword"];

$output = logInUser($uname, $pword);

$decoded = json_decode($output, true);

if ($decoded["status"] === "success") {
    $_SESSION["user_id"] = $decoded["user_id"];
}

echo json_encode($output);