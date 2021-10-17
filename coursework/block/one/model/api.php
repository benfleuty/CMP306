<?php
header('Content-Type: text/html; charset=utf-8');

// Connect to database
include("../model/connection.php");

//  function to get all the items
function getAllPlants()
{
    global $conn;
    $sql = "SELECT CMP306BlockOnePlants.id, scientific_name, common_name, link, description,image
FROM CMP306BlockOnePlants,CMP306BlockOnePlantsImages where isHeader = 1 AND plant_id = CMP306BlockOnePlants.id";
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
    $link = $res["link"];
    $description = $res["description"];
    $images = getPlantImages($id);

    $data = array(
        'id' => $plant_id,
        'scientific_name' => $scientific_name,
        'common_name' => $common_name,
        'link' => $link,
        'description' => $description,
        'images' => $images
    );

    return json_encode($data, JSON_INVALID_UTF8_IGNORE);
}

function getAllPlantImages()
{
    global $conn;
    $sql = "SELECT plant_id, image FROM CMP306BlockOnePlantsImages";
    $result = mysqli_query($conn, $sql);
    $images = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $images[] = $r;
    }

    return $images;
}

function getPlantImages($id)
{
    global $conn;
    $sql = "SELECT plant_id, image FROM CMP306BlockOnePlantsImages WHERE plant_id = $id";
    $result = mysqli_query($conn, $sql);
    $images = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $images[] = $r["image"];
    }

    return $images;
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

function updatePlant($id, $description,$link)
{
    global $conn;
    $sql = "UPDATE CMP306BlockOnePlants SET description = '$description',link = '$link' WHERE id = $id";

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

    $clearTableQuery = "DELETE FROM CMP306BlockOnePlants WHERE 1";
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

function createPlant($common_name, $scientific_name, $description, $link)
{
    global $conn;

    $clean_common_name = sanitiseUserInput($common_name);
    $clean_scientific_name = sanitiseUserInput($scientific_name);
    $clean_description = sanitiseUserInput($description);
    $clean_link = sanitiseUserInput($link);

    $sql = "INSERT INTO CMP306BlockOnePlants (common_name, scientific_name, description,link)  VALUES ('$clean_common_name','$clean_scientific_name','$clean_description','$clean_link')";

    if (mysqli_query($conn, $sql)) {
        $data = array('status' => 'success');
    } else {
        $data = array('status' => 'fail');
    }

    return json_encode($data);
}

function createPlantFull($common_name, $scientific_name, $description, $link)
{
    global $conn;

    $clean_common_name = sanitiseUserInput($common_name);
    $clean_scientific_name = sanitiseUserInput($scientific_name);
    $clean_description = sanitiseUserInput($description);
    $clean_link = sanitiseUserInput($link);

    $sql = "INSERT INTO CMP306BlockOnePlants (scientific_name, common_name, link, description) VALUES ($clean_scientific_name,$clean_common_name,$clean_link,$clean_description)";

    if (mysqli_query($conn, $sql)) {
        $data = array('status' => 'success');
    } else {
        $data = array('status' => 'fail');

    }

    return json_encode($data);
}

function sanitiseUserInput($input): string
{
    return htmlspecialchars(addslashes($input));
}