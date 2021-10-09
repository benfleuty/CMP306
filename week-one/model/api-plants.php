<?php
header('Content-Type: text/html; charset=utf-8');

// Connect to database
include("../model/connection.php");

//  function to get all the items
function getAllPlants()
{
    global $conn;
    $sql = "SELECT * FROM cmp306week1plants";
    $result = mysqli_query($conn, $sql);
    //  convert to JSON
    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return json_encode($rows,JSON_INVALID_UTF8_IGNORE);
}