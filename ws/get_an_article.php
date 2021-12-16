<?php
function get_an_article($id)
{
//  URL of the web service
    include 'location.php';

    // otherwise, get all articles
    //  set up the curl
    $curl = curl_init($location . "/" . $id);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, true);

    $resp = curl_exec($curl);

    if (!$resp) {
        die('Error : "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
    }

    echo $resp;
    curl_close($curl);
}