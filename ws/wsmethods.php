<?php

//  convert a record from database to XML
function convert_to_xml($query)
{
    $txt = '<employee>';
    $txt = $txt . '<id>' . $query['id'] . '</id>';
    $txt = $txt . '<employee_name>' . $query['employee_name'] . '</employee_name>';
    $txt = $txt . '<employee_age>' . $query['employee_age'] . '</employee_age>';
    $txt = $txt . '<employee_salary>' . $query['employee_salary'] . '</employee_salary>';
    $txt = $txt . '</employee>';
    return $txt;
}

// function to get all news articles
function get_all_articles()
{
    global $conn;
    $query = 'select * from CMP306_BlockFour_NewsArticles order by id';
    $result = mysqli_query($conn, $query);
    $txt = '<employees>';
    while ($row = mysqli_fetch_array($result)) {
        $txt .= convert_to_xml($row);
    }
    $txt .= '</employees>';
    return $txt;
}

//  function to get a specific article
function get_article($id)
{
    global $conn;
    $query = 'select * FROM CMP306_BlockFour_NewsArticles where id= ?';

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($query)) {
        // todo handle failure
    }

    $stmt->bind_param('i', $id);

    if (!$stmt->execute()) {
        // todo handle failure
    }

    $result = mysqli_query($conn, $query);
    $response = mysqli_fetch_array($result);

    return convert_to_xml($response);
}

//  function to insert an article
function insert_article($xml)
{
    global $conn;
    $data = simplexml_load_string($xml);
    $query = "INSERT INTO CMP306_BlockFour_NewsArticles (title, description, image, link) VALUES (title ='?', description='?', image='?', link='?')";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($query)) {
        // todo handle failure
    }

    $stmt->bind_param('ssss', $data->title, $data->description, $data->image, $data->link);

    if (!$stmt->execute()) {
        // todo handle failure
    }

    $response = mysqli_query($conn, $query);

    return ($response) ? 1 : 0;
}

//  function to update an article
function update_article($id, $xml)
{
    global $conn;
    $data = simplexml_load_string($xml);
    $query = "UPDATE CMP306_BlockFour_NewsArticles SET title ='?', description='?', image='?', link='?' WHERE id = ?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($query)) {
        // todo handle failure
    }

    $stmt->bind_param('ssssi', $data->title, $data->description, $data->image, $data->link, $id);

    if (!$stmt->execute()) {
        // todo handle failure
    }

    $response = mysqli_query($conn, $query);
    return ($response) ? 1 : 0;
}

//  function to delete an article
function delete_article($id)
{
    global $conn;
    $query = "DELETE FROM CMP306_BlockFour_NewsArticles WHERE id=?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($query)) {
        // todo handle failure
    }

    $stmt->bind_param('i', $id);

    if (!$stmt->execute()) {
        // todo handle failure
    }

    $response = mysqli_query($conn, $query);
    return ($response) ? 1 : 0;
}