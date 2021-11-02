<?php
session_start();
include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";


if (!isset($_POST["amount"], $_POST["card"])) {
    die;
}

$amount = htmlspecialchars($_POST["amount"]);
$card = htmlspecialchars($_POST["card"]);

// Set up the JSON first
$data_to_send = array();
$data_to_send["vendor"] = "1900040";  // student number
$data_to_send["transaction"] = "12345678";  // string of length 8
$data_to_send["amount"] = $amount; // amount less than 100
$data_to_send["card"] = $card;  //  16-digit number

$request = json_encode($data_to_send);

$url = "https://driesh.abertay.ac.uk/~g510572/aberpay/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($request)));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$aberpay_response = json_decode(curl_exec($ch),true);

$_SESSION["transaction"]["amount"] = $amount;
$_SESSION["transaction"]["card"] = $card;
$_SESSION["transaction"]["aberpay-response"] = $aberpay_response;

$product_id = $_SESSION["basket"]["product_id"];
$user_id = $_SESSION["user_id"];
$status = $aberpay_response["status"];

$api_response = processCardPayment($product_id, $user_id, $card, $status);

$_SESSION["transaction"]["api-response"] = $api_response;