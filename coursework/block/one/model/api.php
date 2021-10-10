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

function getPlant($id)
{
    global $conn;

    $sql = "SELECT * FROM CMP306BlockOnePlants WHERE id = $id";


    $res = mysqli_query($conn, $sql)->fetch_assoc();

    $plant_id = $res["id"];
    $scientific_name = $res["scientific_name"];
    $common_name = $res["common_name"];
    $keep_location = $res["keep_location"];
    $description = $res["description"];
    $image = $res["image"];


    $data = array(
        'id' => $plant_id,
        'scientific_name' => $scientific_name,
        'common_name' => $common_name,
        'keep_location' => $keep_location,
        'description' => $description,
        'image' => $image
    );

    return json_encode($data, JSON_INVALID_UTF8_IGNORE);
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

function editPlant($id, $description)
{
    global $conn;
    $sql = "UPDATE CMP306BlockOnePlants SET description = '$description' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        $data = array('status' => 'success');
    } else {
        $data = array('status' => 'fail');
    }

    return json_encode($data);
}

function restoreDatabase()
{
    global $conn;

    $clearTableQuery = "DELETE FROM CMP306BlockOnePlants";
    $fillTableQuery = "INSERT INTO CMP306BlockOnePlants SELECT * FROM cmp306week1plants";

    $sql = $clearTableQuery;
    $data = array();

    if (mysqli_query($conn, $sql)) {
        // good delete
        $sql = $fillTableQuery;
        $res = array('drop_status' => 'success');
    } else {
        // delete fail
        $res = array('drop_status' => 'fail');
    }

    $data = array_merge($data, $res);

    if ($sql == $fillTableQuery && mysqli_query($conn, $sql)) {
        // good insert
        $res = array('fill_status' => 'success');
        $data = array_merge($data, $res);
    }
    return json_encode($data);
}