<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

//  Database connections
$servername = "lochnagar.abertay.ac.uk";
$username = "sql1900040";
$password = "EVUrsMKYpvIn";
$dbname = $username;

/* @var mysqli_result $conn */
$conn = mysqli_connect($servername, $username, $password, $dbname);