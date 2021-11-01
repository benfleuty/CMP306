<?php
session_start();
include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $fail = false;
    $data = array();
    if (empty($id)) {
        // id is empty
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "id was empty";
    }

    if (!ctype_digit($id)) {
        // id is not a number
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "id was an invalid character";
    }

    if ($fail) {
        echo json_encode($data);
        die;
    }


    if (!deleteProduct($id)) {
        // not deleted
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "product could not be deleted";
        echo json_encode($data);
        die;
    }

    $data["status"] = "success";
    echo json_encode($data);
}