<?php

function create_article($title, $description, $image, $link)
{
    // todo remove json make xml??

    global $conn;

    $output = [];

    $pin = 0;

    $sql = 'insert into CMP306_BlockFour_NewsArticles () VALUES (?,?,?,?);';

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        // todo handle error
    }

    $stmt->bind_param('ssss', $title, $description, $image, $link);

    if (!$stmt->execute()) {
        // todo handle error
    }

    $output += [
        'status' => 'success',
        'get_status' => 'success'
    ];

    return json_encode($output);
}