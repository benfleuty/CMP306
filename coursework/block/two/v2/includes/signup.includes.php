<?php

if (!isset($_POST["submit"])) {

}

// get user's input from form
$username = $_POST["username"];
$password = $_POST["password"];
$password_repeat = $_POST["password_repeat"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

// instantiate sign up controller

include_once "../model/dbh.model.php";
include_once "../model/signup.model.php";
include_once "../controller/signup.controller.php";

$signup = new SignupController($username, $password, $password_repeat, $first_name, $last_name);

$signup->sign_up_user();

header("Location: ../view/");