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

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        die("could not prepare sql");
    }

    if (!$stmt->execute()) {
        die("could not execute sql statement");
    }

    //  convert to JSON
    $result = $stmt->get_result();

    $rows = array();
    while ($r = $result->fetch_assoc()) {
        $rows[] = $r;
    }
    return json_encode($rows, JSON_INVALID_UTF8_IGNORE);
}

function getPlant($id, $json_encode = false)
{
    global $conn;

    $sql = "SELECT * FROM CMP306BlockOnePlants WHERE id = ?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        die("could not prepare sql");
    }

    $stmt->bind_param("i", $id);

    if (!$stmt->execute()) {
        die("could not execute sql statement");
    }


    $result = $stmt->get_result()->fetch_assoc();

    $plant_id = $result["id"];
    $scientific_name = $result["scientific_name"];
    $common_name = $result["common_name"];
    $link = $result["link"];
    $description = $result["description"];
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

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        die("could not prepare sql");
    }

    if (!$stmt->execute()) {
        die("could not execute sql statement");
    }

    $result = $stmt->get_result();
    $images = array();
    while ($r = $result->fetch_assoc()) {
        $images[] = $r;
    }

    return $images;
}

function getPlantImages($id)
{
    global $conn;
    $sql = "SELECT plant_id, image FROM CMP306BlockOnePlantsImages WHERE plant_id = ?";

    $stmt = $conn->init();


    if (!$stmt = $conn->prepare($sql)) {
        die("could not prepare sql");
    }

    $stmt->bind_param("i", $id);

    if (!$stmt->execute()) {
        die("could not execute sql statement");
    }

    $result = $stmt->get_result();

    $images = array();
    while ($r = $result->fetch_assoc()) {
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


    $sql = "SELECT CMP306BlockOneArticles.id as art_id
from CMP306BlockOneArticles,CMP306BlockOnePlantArticles
where CMP306BlockOneArticles.id = CMP306BlockOnePlantArticles.id
and CMP306BlockOnePlantArticles.id = ?";

    $data = [];

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        die("could not prepare sql");
    }

    $stmt->bind_param("i",$id);

    if (!$stmt->execute()) {
        die("could not execute sql statement");
    }

    $result = $stmt->get_result();

    if (!$result) {
        $data["status"] = "fail";
        $data["sql"] = mysqli_error($conn);
        return json_encode($data);
    }

    $data["status"] = "success";

    $data["ids"] = [];

    while ($row = $result->fetch_assoc()) {
        $data["ids"][] = $row["art_id"];
    }

    return $data;
}

function getArticle($id)
{
    global $conn;

    $sql = "SELECT * from CMP306BlockOneArticles where id =  ?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        die("could not prepare sql");
    }

    $stmt->bind_param("i",$id);

    if (!$stmt->execute()) {
        die("could not execute sql statement");
    }

    $data = [];

    $result = $stmt->get_result();

    if (!$result) {
        $data["status"] = "fail";
        $data["sql"] = mysqli_error($conn);
        return json_encode($data);
    }

    $data["status"] = "success";

    $data["article"] = $result->fetch_assoc();


    return $data;
}

