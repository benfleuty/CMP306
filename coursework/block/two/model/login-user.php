<?php
session_start();
unset($_SESSION["user_id"]);

require_once "api.php";
if(!isset($_POST["uname"]) || empty($_POST["uname"]) || !isset($_POST["pword"])){
    die();
}

$uname = sanitiseUserInput($_POST["uname"]);
$pword = hash_password($_POST["pword"]);

$output = logInUser($uname,$pword);

if ($output["status"] === "success") {
    $_SESSION["user_id"] = $output["user_id"];
}

echo json_encode($output);