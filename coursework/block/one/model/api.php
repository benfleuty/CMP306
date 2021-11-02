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

function getLinkedArticles($id)
{
    global $conn;

    // todo binding
    $clean_id = $id;

    $sql = 'SELECT CMP306BlockOneArticles.id as art_id
from CMP306BlockOneArticles,CMP306BlockOnePlantArticles
where CMP306BlockOneArticles.id = CMP306BlockOnePlantArticles.id
and CMP306BlockOnePlantArticles.id = ' . $clean_id;

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

function getArticle($id)
{
    global $conn;

    // todo binding
    $clean_id = $id;

    $sql = 'SELECT * from CMP306BlockOneArticles where id =  ' . $clean_id;

    $data = [];

    $res = mysqli_query($conn, $sql);

    if (!$res) {
        $data["status"] = "fail";
        $data["sql"] = mysqli_error($conn);
        return json_encode($data);
    }

    $data["status"] = "success";

    $data["article"] = $res->fetch_assoc();



    return $data;
}

