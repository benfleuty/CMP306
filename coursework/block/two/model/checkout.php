<?php
session_start();
include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";

if (isset($_POST["cardNum"], $_POST["sortCode"], $_POST["cvc"], $_SESSION["basket"]["product_id"], $_SESSION["user_id"])) {
    $cardNum = $_POST["cardNum"];
    $sortCode = $_POST["sortCode"];
    $cvc = $_POST["cvc"];
    $product_id = $_SESSION["basket"]["product_id"];
    $user_id = $_SESSION["user_id"];


    $fail = false;
    $data = array();
    if (empty($cardNum)) {
        // id is empty
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "cardNum was empty";
    }
    if (empty($sortCode)) {
        // id is empty
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "sortCode was empty";
    }
    if (empty($cvc)) {
        // id is empty
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "cvc was empty";
    }
    if (empty($product_id)) {
        // id is empty
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "product_id was empty";
    }
    if (empty($user_id)) {
        // id is empty
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "user_id was empty";
    }

    if (!ctype_digit($cardNum)) {
        // id is not a number
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "cardNum contains an invalid character";
    }
    if (!ctype_digit($sortCode)) {
        // id is not a number
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "sortCode contains an invalid character";
    }
    if (!ctype_digit($cvc)) {
        // id is not a number
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "cvc contains an invalid character";
    }
    if (!ctype_digit($product_id)) {
        // id is not a number
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "product_id contains an invalid character";
    }
    if (!ctype_digit($user_id)) {
        // id is not a number
        $fail = true;
        $data["status"] = "fail";
        $data["messages"][] = "user_id contains an invalid character";
    }

    if ($fail) {
        echo json_encode($data);
        die;
    }

    $success = true;

    // simulate 5% chance of failure
    try {
        if (random_int(1, 100) >= 95) {
            $data["status"] = "fail";
            $data["messages"][] = "The card payment could not be completed!";
            $success = false;
        }
    } catch (Exception $e) {
    }

    $data["api-response"] = processCardPayment($product_id, $user_id, $cardNum, $sortCode, $cvc, $success);

    if ($data["api-response"]["status"] === "success") {
        $data["status"] = "success";
    } else {
        $data["status"] = "fail";
    }

    echo json_encode($data);
}