<?php

$error = false;

$errors = [];

if (!isset($_POST['pin'])) {
    $errors['status'] = 'error';
    $errors['messages'][] = 'pin not set';
    $error = true;
}


//if (!isset($_POST['value'])) {
//    $errors['status'] = 'error';
//    $errors['messages'][] = 'state not set';
//    $error = true;
//}

$pin = $_POST['pin'];
//$value = $_POST['value'];

if (!is_numeric($pin)) {
    $errors['status'] = 'error';
    $errors['messages'][] = 'pin is invalid';
    $error = true;
}
//if (!is_numeric($value)) {
//    $errors['status'] = 'error';
//    $errors['messages'][] = 'value is invalid';
//    $error = true;
//}

if ($error) {
    echo json_encode($errors);
    exit;
}

$url = "https://agent.electricimp.com/nXgBWwvudB8w?pin=$pin";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

return json_decode(curl_exec($curl), true)[0];