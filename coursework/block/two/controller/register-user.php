<?php
session_start();
require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
if (!isset($_POST["uname"], $_POST["fname"], $_POST["lname"], $_POST["pword"]) ||
    empty($_POST['uname']) ||
    empty($_POST['fname']) ||
    empty($_POST['lname']) ||
    empty($_POST['pword'])) {
    die();
}

$output = registerUser($_POST['uname'], $_POST['fname'], $_POST['lname'], $_POST['pword']);

$decoded = json_decode($output, true);

if ($decoded['status'] === 'success') {
    $_SESSION['user_id'] = $decoded['user_id'];
}

echo json_encode($output);