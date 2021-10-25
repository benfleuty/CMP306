<?php
session_start();
require_once "api.php";
if(!isset($_POST["uname"]) || empty($_POST["uname"]) || !isset($_POST["fname"]) || !isset($_POST["lname"]) || !isset($_POST["pword"])){
    die();
}

$uname = sanitiseUserInput($_POST["uname"]);
$fname = sanitiseUserInput($_POST["fname"]);
$lname = sanitiseUserInput($_POST["lname"]);
$pword = hash_password($_POST["pword"]);


$output = registerUser($uname,$pword,$fname,$lname);

if ($output["status"] == "success") {
    $_SESSION["user_id"] = $output["user_id"];
}

echo json_encode($output);