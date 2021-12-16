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
            // if id is set then get a specific article
            $id = $_GET['id'];
            if (!empty($id) && ctype_digit($id)) {
                $response = get_article($id);
            }

            if (!ctype_digit($id)) {
                die('invalid id');
            }
        }else{
            $response = get_all_articles();
        }
        break;

    case 'POST':
        // get post data
        $xml = file_get_contents("php://input");
return "nnnn";
        return $xml;

        // insert to db and store response
        $response = insert_article($xml);
        break;

    case 'PUT':
        // get post data
        $xml = file_get_contents('php://input');
        return $xml;

        // insert to db and store response
        $response = update_article($xml);
        break;

    case 'DELETE':
        echo 'method: delete';
        break;

    default:
        die("unsupported request method");
}

exit((string)$response);