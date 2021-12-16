<?php
//  URL of the web service
include 'location.php';

var_dump($_POST);

exit;
$fail = false;
$fail_message = 'error(s): missing: ';

$title = '';
$description = '';
$image = '';
$link = '';

// not set or empty
if (!isset($_PUT['title']) || empty($title = $_PUT['title'])) {
    $fail = true;
    $fail_message .= 'title ';
}

if (!isset($_PUT['description']) || empty($description = $_PUT['description'])) {
    $fail = true;
    $fail_message .= 'description ';
}

if (!isset($_PUT['image']) || empty($image = $_PUT['image'])) {
    $fail = true;
    $fail_message .= 'image ';
}

if (!isset($_PUT['link']) || empty($link = $_PUT['link'])) {
    $fail = true;
    $fail_message .= 'link ';
}

if (!isset($_PUT['id']) || empty($id = $_PUT['id'])) {
    $fail = true;
    $fail_message .= 'id ';
}

if ($fail) {
    die($fail_message);
}

//  create data in XML format
$data = '<news_article>';
$data .= "<title>{$title}</title>";
$data .= "<description>{$description}</description>";
$data .= "<image>{$image}</image>";
$data .= "<link>{$link}</link>";
$data .= "<id>{$id}</id>";
$data .= '</news_article>';

//  set up the curl
$curl = curl_init($location);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: text/xml',
        'Content-Length: ' . strlen($data))
);

$resp = curl_exec($curl);

if (!$resp) {
    die('Error : "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}

echo $resp;
curl_close($curl);