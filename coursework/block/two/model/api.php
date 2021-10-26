<?php

// Connect to database
include("../model/connection.php");

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

function isSpecialUserByID($id){
    global $conn;

    $sql = "SELECT special FROM CMP306BlockTwoUsers WHERE id = $id";

    $res = mysqli_query($conn, $sql)->fetch_assoc();

    $output = array();

    if (!$res) {
        $output["status"] = "fail";
        return $output;
    }

    $output["status"] = "success";
    $output["special"] = $res["special"] === 1;
    return $output;
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

    $sql = "SELECT id FROM CMP306BlockTwoUsers WHERE username = '$uname'";

    $res = mysqli_query($conn, $sql);
    $row = $res->fetch_assoc();

    $output = array();
    if (mysqli_num_rows($res) !== 1) {
        $output += [
            "status" => "fail",
            "message" => "There was an error!"
        ];
        return $output;
    }

    $output += [
        "status" => "success",
        "message" => "User created!",
        "user_id" => $row["id"]
    ];

    return $output;
}

function hash_password($pword)
{
    $salt = "this is some salt";
    $toHash = $salt . $pword;
    return password_hash($toHash, PASSWORD_DEFAULT);
}

function sanitiseUserInput($input): string
{
    return htmlspecialchars(addslashes($input));
}