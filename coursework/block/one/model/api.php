<?php
header('Content-Type: text/html; charset=utf-8');

// Connect to database
include("../model/connection.php");


//  function to get all the items
function getAllPlants()
{
    global $conn;
    $sql = "SELECT * FROM CMP306BlockOnePlants";
    $result = mysqli_query($conn, $sql);
    //  convert to JSON
    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return json_encode($rows, JSON_INVALID_UTF8_IGNORE);
}

function deletePlant($id)
{
    global $conn;

    $sql = "DELETE FROM CMP306BlockOnePlants WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $data = array('status' => 'success');
    } else {
        $data = array('status' => 'error');
    }

    $data = array_merge($data, array('plant_id' => $id));

    return json_encode($data);
}

