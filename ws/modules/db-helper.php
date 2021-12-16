<?php
// function to get all news articles
function get_all_articles()
{
    global $conn;
    $query = 'select * from CMP306_BlockFour_NewsArticles order by id';
    $result = mysqli_query($conn, $query);
    $txt = '<articles>';
    while ($row = mysqli_fetch_array($result)) {
        $txt .= convert_to_xml($row);
    }
    $txt .= '</articles>';
    return $txt;
}

//  function to get a specific article
function get_article(int $id)
{
    global $conn;
    $query = "select * FROM CMP306_BlockFour_NewsArticles where id = ?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($query)) {
        return 0;
    }

    $stmt->bind_param('i', $id);

    if (!$stmt->execute()) {
        return 0;
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
    $query = 'INSERT INTO CMP306_BlockFour_NewsArticles (title, description, image, link) VALUES (?,?,?,?)';
    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($query)) {
        return 0;
    }

    $title = (string)$data->title;
    $description = (string)$data->description;
    $image = (string)$data->image;
    $link = (string)$data->link;

    $stmt->bind_param('ssss', $title, $description, $image, $link);

    return $stmt->execute();
}

//  function to update an article
function update_article($id, $xml)
{
    global $conn;
    $data = simplexml_load_string($xml);
    $query = 'UPDATE CMP306_BlockFour_NewsArticles SET title = ?, description= ?, image= ?, link= ? WHERE id = ?';

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($query)) {
        return 0;
    }

    $title = (string)$data->title;
    $description = (string)$data->description;
    $image = (string)$data->image;
    $link = (string)$data->link;

    $stmt->bind_param('ssss', $title, $description, $image, $link, $id);

    if (!$stmt->execute()) {
        return 0;
    }

    $response = mysqli_query($conn, $query);
    return ($response) ? 1 : 0;
}

//  function to delete an article
function delete_article($id)
{
    global $conn;
    $query = 'DELETE FROM CMP306_BlockFour_NewsArticles WHERE id = ?';

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($query)) {
        return 0;
    }

    $stmt->bind_param('i', $id);

    if (!$stmt->execute()) {
        return 0;
    }

    $response = mysqli_query($conn, $query);
    return ($response) ? 1 : 0;
}