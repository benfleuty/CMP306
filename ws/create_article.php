<?php
//  URL of the web service
include 'location.php';

$fail = false;
$fail_message = "error(s): missing: ";

$title = '';
$description = '';
$image = '';
$link = '';

// not set or empty
if (!isset($_POST['title']) || empty($title = $_POST['title'])) {
    $fail = true;
    $fail_message .= 'title ';
}

if (!isset($_POST['description']) || empty($description = $_POST['description'])) {
    $fail = true;
    $fail_message .= 'description ';
}

if (!isset($_POST['image']) || empty($image = $_POST['image'])) {
    $fail = true;
    $fail_message .= 'image ';
}

if (!isset($_POST['link']) || empty($link = $_POST['link'])) {
    $fail = true;
    $fail_message .= 'link ';
}

if ($fail){
    die($fail_message);
}

//  create data in XML format
$data = "<news_article>";
$data .= "<title>{$title}</title>";
$data .= "<description>{$description}</description>";
$data .= "<image>{$image}</image>";
$data .= "<link>{$link}</link>";
$data .= "</news_article>";

//  set up the curl
$curl = curl_init($location);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: text/xml',
        'Content-Length: ' . strlen($data))
);

$resp = curl_exec($curl);
exit($resp);
if (!$resp) {
    die('Error : "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}

echo $resp;
curl_close($curl);