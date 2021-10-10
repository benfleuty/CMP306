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

function getPlant($id){
    global $conn;

    $sql = "SELECT * FROM CMP306BlockOnePlants WHERE id = $id" ;


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

    return json_encode($data,JSON_INVALID_UTF8_IGNORE);
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

function editPlant($id,$description){
    global $conn;
    $sql = "UPDATE CMP306BlockOnePlants SET description = '$description' WHERE id = $id";

    if (mysqli_query($conn,$sql)){
        $data = array('status' => 'success');
    }else{
        $data = array('status' => 'fail');
    }

    return json_encode($data);
}