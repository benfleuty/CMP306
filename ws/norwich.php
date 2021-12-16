<?php

include_once "connection.php";
include_once "wsmethods.php";
// connect to the database
$conn = connect();

$method = $_SERVER['REQUEST_METHOD'];
$response = "undefined";

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            echo "getting id:" . $_GET['id'];
        } else {
            echo "getting all";
        }
        break;

    case 'POST':
        // get post data
        $xml = file_get_contents("php://input");

        // insert to db and store response
        $response = insert_article($xml);
        break;

    case 'PUT':
        echo 'method: put';
        break;

    case 'DELETE':
        echo 'method: delete';
        break;

    default:
        die("unsupported request method");
}

exit((string)$response);