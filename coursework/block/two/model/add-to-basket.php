<?php
session_start();
if (!isset($_POST["id"])) {
    $data["status"] = "fail";
    $data["messages"][] = "id not set";
    echo json_encode($data);
    die;
}

$id = $_POST["id"];

if(empty($id)){
    $data["status"] = "fail";
    $data["messages"][] = "id empty";
    echo json_encode($data);
    die;
}

if(!ctype_digit($id)){
    $data["status"] = "fail";
    $data["messages"][] = "id is not a valid character";
    echo json_encode($data);
    die;
}

$_SESSION["basket"] = $id;

$data["status"] = "success";
$data["basket_count"] = 1;
echo json_encode($data);