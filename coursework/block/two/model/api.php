<?php

// Connect to database
include("connection.php");

function getUserByUsername($username)
{
    global $conn;

    $sql = "SELECT * FROM CMP306BlockTwoUsers WHERE username = ?";

    $stmt = $conn->init();

    $output = [];

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param("s", $username);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if (!$result) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error getting the user!'
        ];
        return json_encode($output);
    }

    $output["status"] = "success";
    $output["user"] = $result;

    return json_encode($output);
}

function getUserById($id)
{
    global $conn;

    $sql = "SELECT special, id, username, first_name, last_name
FROM CMP306BlockTwoUsers WHERE id = ?";

    $stmt = $conn->init();

    $output = [];

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param("i", $id);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if (!$result) {
        $output["status"] = "fail";
        return json_encode($output);
    }

    $result = $result->fetch_assoc();

    $output["status"] = "success";
    $output["user"] = $result;

    return json_encode($output);
}

function isSpecialUserByID($id)
{
    global $conn;

    $sql = "SELECT special FROM CMP306BlockTwoUsers WHERE id = ?";

    $stmt = $conn->init();

    $output = [];

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param("i", $id);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if (!$result) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error!',
            'special' => false
        ];
        return $output;
    }

    $row = $result->fetch_assoc();

    $output['special'] = $row['special'];

    return json_encode($output);
}

function registerUser($username, $password, $first_name, $last_name)
{
    global $conn;

    $output = [];

    $sql = "SELECT COUNT(id) AS count FROM CMP306BlockTwoUsers WHERE username = ?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param("s", $username);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();
    $result = $result->fetch_assoc();

    if ($result["count"] > 0) {
        $output += [
            "status" => "fail",
            "message" => "This username is already in use!"
        ];
        return json_encode($output);
    }

    $sql = "INSERT INTO CMP306BlockTwoUsers (username, password, first_name, last_name) VALUES (?,?,?,?)";

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt->bind_param('ssss', $username, $hashed_password, $first_name, $last_name);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error creating this user.'
        ];
        return json_encode($output);
    }

    $sql = "SELECT id FROM CMP306BlockTwoUsers WHERE username = ?";

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('s', $username);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        $output += [
            'status' => 'fail',
            'message' => 'Error getting user!'
        ];
        return json_encode($output);
    }

    $result = $result->fetch_assoc();

    $output += [
        "status" => "success",
        "message" => "User created!",
        "user_id" => $result["id"]
    ];

    return json_encode($output);
}

function logInUser($username, $password)
{
    global $conn;

    $output = [];

    $sql = "SELECT id,password FROM CMP306BlockTwoUsers WHERE username = ?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('s', $username);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if (!$result) {
        $output += [
            'status' => 'fail',
            'message' => 'User not found'
        ];
        return json_encode($output);
    }

    if ($result->num_rows !== 1) {
        $output += [
            "status" => "fail",
            "message" => "There was an error!",
            "num_rows" => $result->num_rows
        ];
        return json_encode($output);
    }

    $result = $result->fetch_assoc();

    $match = password_verify($password, $result["password"]);

    if (!$match) {
        $output += [
            "status" => "fail",
            "message" => "Wrong username/password!",
            "input" => $password,
            "pass" => $result["password"]
        ];
        return json_encode($output);
    }

    $output += [
        "status" => "success",
        "user_id" => $result["id"]
    ];

    return json_encode($output);
}

function getAllProducts()
{
    global $conn;
    $output = [];
    $sql = "SELECT * FROM CMP306BlockTwoProducts";

    $stmt = $conn->init();

    $output = [];

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        $output["status"] = "fail";
        $output["message"] = "No products found";
        return json_encode($output);
    }

    $output["status"] = "success";

    while ($row = $result->fetch_assoc()) {
        $product["id"] = $row["id"];
        $product["name"] = $row["name"];
        $product["price"] = $row["price"];
        $product["image"] = $row["image"];
        $product["description"] = $row["description"];

        $output["products"][] = $product;
    }

    return json_encode($output);
}

function getProductById($id)
{
    global $conn;
    $output = [];
    $sql = "SELECT * FROM CMP306BlockTwoProducts WHERE id = ?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('i', $id);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        $output["status"] = "fail";
        $output["message"] = "Product not found";
        return json_encode($output);
    }

    $output["status"] = "success";

    $row = $result->fetch_assoc();

    $product["id"] = $row["id"];
    $product["name"] = $row["name"];
    $product["price"] = $row["price"];
    $product["image"] = $row["image"];
    $product["description"] = $row["description"];

    $output["product"] = $product;

    return json_encode($output);
}

function getProductByTransactionId($id)
{
    global $conn;
    $output = [];
    $sql = "select CMP306BlockTwoProducts.* from CMP306BlockTwoProducts,CMP306BlockTwoTransactions
where CMP306BlockTwoTransactions.id = ?
and CMP306BlockTwoTransactions.product_id = CMP306BlockTwoProducts.id
";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('i', $id);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        $output["status"] = "fail";
        $output["message"] = "Product not found";
        return json_encode($output);
    }

    $output["status"] = "success";

    $row = $result->fetch_assoc();

    $product["id"] = $row["id"];
    $product["name"] = $row["name"];
    $product["price"] = $row["price"];
    $product["image"] = $row["image"];
    $product["description"] = $row["description"];

    $output["product"] = $product;

    return json_encode($output);
}

function deleteProduct($id): bool
{
    global $conn;
    $output = [];
    $sql = "DELETE FROM CMP306BlockTwoProducts WHERE id = ?";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('i', $id);

    return $stmt->execute();
}

function updateProduct($id, $name, $price, $description)
{
    global $conn;

    $sql = "update CMP306BlockTwoProducts set name = ?, price = ?, description = ? where id = ?";

    $output = [];

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('sdsi', $name, $price, $description, $id);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.',
            'update_status' => 'fail'
        ];
        return json_encode($output);
    }

    $output["update_status"] = 'success';

    $output["id"] = $id;
    return json_encode($output);
}

function createProduct($name, $price, $description)
{
    global $conn;

    $sql = "insert into CMP306BlockTwoProducts (name, price, description) values (?,?,?)";

    $output = [];

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('sds', $name, $price, $description);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.',
            'create_status' => 'fail'
        ];
        return json_encode($output);
    }


    $output["create_status"] = 'success';

    $sql = "SELECT LAST_INSERT_ID() AS id";


    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.',
            'get_id_status' => 'fail'
        ];
        return json_encode($output);
    }

    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        $output['get_id_status'] = 'fail';
    }

    $output["get_id_status"] = "success";
    $row = $result->fetch_assoc();
    $id = $row["id"];
    $output["id"] = $id;

    return json_encode($output);
}

function restoreDatabase()
{
    global $conn;
    $clearTableQuery = "DELETE FROM CMP306BlockTwoProducts WHERE 1";

    $fillTableQuery = "INSERT INTO CMP306BlockTwoProducts SELECT * FROM CMP306BlockTwoProductsBackup";

    $sql = $clearTableQuery;
    $output = [];

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.',
            'drop_status' => 'fail'
        ];
        return json_encode($output);
    }

    $output["drop_status"] = "success";
    $sql = $fillTableQuery;

    // fill db

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.',
            'fill_status' => 'fail'
        ];
        return json_encode($output);
    }

    $output['fill_status'] = 'success';

    return json_encode($output);
}

function processCardPayment($product_id, $user_id, $card_number, $status)
{
    global $conn;

    $sql = "INSERT INTO CMP306BlockTwoTransactions (product_id, user_id, card_num, status) VALUES (?,?,?,?)";

    $stmt = $conn->init();

    $output = [];

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('iiii', $product_id, $user_id, $card_number, $status);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error saving the card information!'
        ];
        return json_encode($output);
    }

    $sql = "SELECT LAST_INSERT_ID() AS id";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9900.'
        ];
        return json_encode($output);
    }

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'message' => 'There was an error! 9901.',
            'get_id_status' => 'fail'
        ];
        return json_encode($output);
    }

    $output['get_id_status'] = 'success';

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    $id = $row["id"];
    $output["id"] = $id;

    $output += [
        "status" => "success",
        "message" => "Transaction stored!",
    ];

    return json_encode($output);
}