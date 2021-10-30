<?php
header('Content-Type: text/html; charset=utf-8');

// Connect to database
include("../model/connection.php");

//  function to get all the items
function getAllPlants()
{
    global $conn;
    $sql = "SELECT CMP306BlockOnePlants.id, scientific_name, common_name, link, description,CMP306BlockOnePlantsImages.image
FROM CMP306BlockOnePlants left join CMP306BlockOnePlantsImages on CMP306BlockOnePlants.id = CMP306BlockOnePlantsImages.id;";
    $result = mysqli_query($conn, $sql);
    //  convert to JSON
    $rows = array();

    while ($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    return json_encode($rows, JSON_INVALID_UTF8_IGNORE);
}

function getPlant($id, $json_encode = false)
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
    if ($json_encode) {
        return json_encode($data, JSON_INVALID_UTF8_IGNORE);
    }
    return $data;
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

    if (empty($images)) {
        $images = "";
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

function updatePlant($id, $common, $scientific, $description, $link)
{
    global $conn;
    $sql = "UPDATE CMP306BlockOnePlants SET common_name = '$common', scientific_name = '$scientific', description = '$description',link = '$link' WHERE id = $id";

    $data = [];

    if (mysqli_query($conn, $sql)) {
        $data += array('update_status' => 'success');
    } else {
        $data += array('update_status' => 'fail');
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

    if ($sql === $fillTableQuery && mysqli_query($conn, $sql)) {
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

    $data = [];

    if (mysqli_query($conn, $sql)) {
        $data += array('create_status' => 'success');
    } else {
        $data += array('create_status' => 'fail');
        return json_encode($data);
    }

    $sql = "SELECT LAST_INSERT_ID() AS id";
    if ($res = mysqli_query($conn, $sql)) {
        $data += array('get_id_status' => 'success');
        $res = $res->fetch_assoc();
        $id = $res["id"];
        $data += array('plant_id' => $id);
    } else {
        $data += array('get_id_status' => 'fail');
    }

    return json_encode($data);
}

function getLinkedArticles($id)
{
    global $conn;

    $clean_id = sanitiseUserInput($id);

    $sql = 'SELECT CMP306BlockOneArticles.id as art_id
from CMP306BlockOneArticles,CMP306BlockOnePlantArticles
where CMP306BlockOneArticles.id = CMP306BlockOnePlantArticles.id
and CMP306BlockOnePlantArticles.id = '.$clean_id;

    $data = [];

    $res = mysqli_query($conn, $sql);

    if (!$res) {
        $data["status"] = "fail";
        $data["sql"] = mysqli_error($conn);
        return json_encode($data);
    }

    $data["status"] = "success";

    $data["ids"] = [];

    while ($row = $res->fetch_assoc()) {
        $data["ids"][] = $row["art_id"];
    }

    return $data;
}

function sanitiseUserInput($input): string
{
    return htmlspecialchars(addslashes($input));
}