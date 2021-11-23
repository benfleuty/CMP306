<?php
include('../model/connection.php');

function log_to_db($table, $pin, $value)
{
    global $conn;

    $output = [];

    $sql = "insert into {$table} (pin,value) values (?,?)";

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('id', $pin, $value);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'insert_status' => 'fail'
        ];
        return json_encode($output);
    }

    $output += [
        'status' => 'success',
        'insert_status' => 'success'
    ];

    return json_encode($output);
}

function log_led_imp($pin, $value)
{
    return log_to_db('CMP306_BlockThree_UserInteractions', $pin, $value);
}

function log_temperature_imp($pin, $value)
{
    return log_to_db('CMP306_BlockThreeJSONTemps', $pin, $value);
}