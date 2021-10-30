<?php

// Connect to database
include("/home/1900040/public_html/cmp306/coursework/block/two/model/connection.php");

function getUserByUsername($uname)
{
    global $conn;

    $sql = "SELECT * FROM CMP306BlockTwoUsers WHERE username = '$uname'";

    $res = mysqli_query($conn, $sql)->fetch_assoc();

    $output = array();

    if (!$res) {
        $output["status"] = "fail";
        return $output;
    }

    $output["status"] = "success";
    return array_merge($output, $res);
}

function getUserById($id)
{
    global $conn;

    $sql = "SELECT * FROM CMP306BlockTwoUsers WHERE id = $id";

    $res = mysqli_query($conn, $sql)->fetch_assoc();

    $output = array();

    if (!$res) {
        $output["status"] = "fail";
        return $output;
    }

    $output["status"] = "success";
    return array_merge($output, $res);
}

function isSpecialUserByID($id)
{
    global $conn;

    $sql = "SELECT special FROM CMP306BlockTwoUsers WHERE id = $id";

    $res = mysqli_query($conn, $sql)->fetch_assoc();

    if (!$res) {
        return null;
    }

    return $res["special"] == true;
}

function registerUser($uname, $pword, $fname, $lname): array
{
    global $conn;

    $data = array();

    $sql = "SELECT COUNT(id) AS count FROM CMP306BlockTwoUsers WHERE username = '$uname'";

    $res = mysqli_query($conn, $sql)->fetch_assoc();

    $output = array();
    if ($res["count"] > 0) {
        $output += [
            "status" => "fail",
            "message" => "This username is already in use!"
        ];
        return $output;
    }

    $sql = "INSERT INTO CMP306BlockTwoUsers (username, password, first_name, last_name) VALUES ('$uname','$pword','$fname','$lname')";

    $success = mysqli_query($conn, $sql);

    if (!$success) {
        $output += [
            "status" => "fail",
            "message" => "There was an error creating this user."
        ];
        return $output;
    }

    $sql = "SELECT id FROM CMP306BlockTwoUsers WHERE username = '$uname'";
    $res = mysqli_query($conn, $sql)->fetch_assoc();

    $output += [
        "status" => "success",
        "message" => "User created!",
        "user_id" => $res["id"]
    ];

    return $output;
}

function logInUser($uname, $pword)
{
    global $conn;

    $data = array();

    $sql = "SELECT id,password FROM CMP306BlockTwoUsers WHERE username = '$uname'";

    $res = mysqli_query($conn, $sql);

    // TODO: add error handling here if res is false

    $row = $res->fetch_assoc();

    $output = array();
    if (mysqli_num_rows($res) !== 1) {
        $output += [
            "status" => "fail",
            "message" => "There was an error!"
        ];
        return $output;
    }

    global $salt;
    $match = password_verify($pword, $row["password"]);
    if (!$match) {
        $output += [
            "status" => "fail",
            "message" => "Wrong username/password!",
            "input" => $pword,
            "pass" => $row["password"]
        ];
        return $output;
    }

    $output += [
        "status" => "success",
        "user_id" => $row["id"]
    ];

    return $output;
}

function hash_password($pword)
{
    return password_hash($pword, PASSWORD_DEFAULT);
}

function sanitiseUserInput($input): string
{
    return htmlspecialchars(addslashes($input));
}

function getAllProducts(): array
{
    require_once "connection.php";

    global $conn;
    $data = array();
    $sql = "SELECT * FROM CMP306BlockTwoProducts";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) < 1) {
        $data["status"] = "fail";
        $data["message"] = "No products found";
        return $data;
    }

    $data["status"] = "success";

    while ($row = $res->fetch_assoc()) {
        $product["id"] = $row["id"];
        $product["name"] = $row["name"];
        $product["price"] = $row["price"];
        $product["image"] = $row["image"];
        $product["description"] = $row["description"];

        $data["products"][] = $product;
    }

    return $data;

}

function getProductById($id): array
{
    require_once "connection.php";

    global $conn;
    $data = array();
    $sql = "SELECT * FROM CMP306BlockTwoProducts WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) !== 1) {
        $data["status"] = "fail";
        $data["message"] = "Product not found";
        return $data;
    }

    $data["status"] = "success";

    $row = $res->fetch_assoc();

    $product["id"] = $row["id"];
    $product["name"] = $row["name"];
    $product["price"] = $row["price"];
    $product["image"] = $row["image"];
    $product["description"] = $row["description"];

    $data["product"] = $product;

    return $data;

}

function getProductByTransactionId($id): array
{
    require_once "connection.php";

    global $conn;
    $data = array();
    $sql = "select CMP306BlockTwoProducts.* from CMP306BlockTwoProducts,CMP306BlockTwoTransactions
where CMP306BlockTwoTransactions.id = $id
and CMP306BlockTwoTransactions.product_id = CMP306BlockTwoProducts.id
limit 1";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) !== 1) {
        $data["status"] = "fail";
        $data["message"] = "Product not found";
        return $data;
    }

    $data["status"] = "success";

    $row = $res->fetch_assoc();

    $product["id"] = $row["id"];
    $product["name"] = $row["name"];
    $product["price"] = $row["price"];
    $product["image"] = $row["image"];
    $product["description"] = $row["description"];

    $data["product"] = $product;

    return $data;

}

function deleteProduct($id): bool
{
    require_once "connection.php";

    global $conn;
    $data = array();
    $sql = "DELETE FROM CMP306BlockTwoProducts WHERE id = $id";
    return mysqli_query($conn, $sql);
}

function updateProduct($id, $name, $price, $desc)
{
    global $conn;

    $clean_id = mysqli_real_escape_string($conn, $id);
    $clean_name = mysqli_real_escape_string($conn, $name);
    $clean_price = mysqli_real_escape_string($conn, $price);
    $clean_desc = mysqli_real_escape_string($conn, $desc);

    $sql = "update CMP306BlockTwoProducts set name = '$clean_name', price = $clean_price,description = '$clean_desc' where id = $clean_id";

    $data = [];

    if (mysqli_query($conn, $sql)) {
        $data["update_status"] = 'success';
    } else {
        $data["update_status"] = 'fail';
    }

    $data["sql"] = $sql;


    $data["id"] = $id;
    return json_encode($data);
}

function createProduct($name, $price, $desc)
{
    global $conn;

    $clean_name = mysqli_real_escape_string($conn, $name);
    $clean_price = mysqli_real_escape_string($conn, $price);
    $clean_desc = mysqli_real_escape_string($conn, $desc);

    $sql = "insert into CMP306BlockTwoProducts (name, price, description) values ('$clean_name','$clean_price','$clean_desc')";

    $data = [];

    if (mysqli_query($conn, $sql)) {
        $data["create_status"] = 'success';
    } else {
        $data["create_status"] = 'fail';
    }

    $sql = "SELECT LAST_INSERT_ID() AS id";

    if ($res = mysqli_query($conn, $sql)) {
        $data["get_id_status"] = "success";
        $res = $res->fetch_assoc();
        $id = $res["id"];
        $data["id"] = $id;
    } else {
        $data["get_id_status"] = "fail";
    }

    return json_encode($data);
}

function restoreDatabase()
{
    global $conn;
    $clearTableQuery = "DELETE FROM CMP306BlockTwoProducts WHERE 1";

    $fillTableQuery = "INSERT INTO CMP306BlockTwoProducts SELECT * FROM CMP306BlockTwoProductsBackup";

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

function processCardPayment($product_id, $user_id, $card_number, $status): array
{
    global $conn;

    $clean_product_id = htmlspecialchars($product_id);
    $clean_user_id = htmlspecialchars($user_id);
    $clean_card_number = htmlspecialchars($card_number);
    $clean_status = htmlspecialchars($status);

    $sql = "INSERT INTO CMP306BlockTwoTransactions (product_id, user_id, card_num, status) VALUES ($clean_product_id,$clean_user_id,'$clean_card_number',$clean_status)";

    $res = mysqli_query($conn, $sql);

    $output = array();
    if (!$res) {
        $output += [
            "status" => "fail",
            "message" => "There was an error saving the card information!",
            "mysqli_error" => mysqli_error($conn),
            "sql" => $clean_status
        ];
        return $output;
    }

    $sql = "SELECT LAST_INSERT_ID() AS id";

    if ($res = mysqli_query($conn, $sql)) {
        $output["get_id_status"] = "success";
        $res = $res->fetch_assoc();
        $id = $res["id"];
        $output["id"] = $id;
    } else {
        $output["get_id_status"] = "fail";
    }

    $output += [
        "status" => "success",
        "message" => "Transaction stored!",
    ];

    return $output;
}