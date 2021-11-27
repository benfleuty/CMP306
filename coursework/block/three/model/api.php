<?php
include('../model/connection.php');

function httpResponse($code, $message)
{
    http_response_code($code);
    echo $message;
    exit;
}

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

function get_temperatures_lastX(int $location, int $count)
{
    global $conn;

    $output = [];

    $pin = 0;

    if (!is_numeric($location)) {
        echo json_encode(['status' => 'bad input']);
        exit;
    }

    if ($location === 8 || $location === 9) {
        $pin = $location;
    } else {
        return json_encode(["status" => "fail", "message" => "bad pin"]);
    }

    $sql = 'select dttm, value from CMP306_BlockThreeJSONTemps where pin = ? order by dttm desc limit ?';

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail',
            "message" => "could not prepare"
        ];
        return json_encode($output);
    }

    $stmt->bind_param('ii', $pin, $count);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'get_status' => 'fail'
        ];
        return json_encode($output);
    }

    $output += [
        'status' => 'success',
        'get_status' => 'success'
    ];

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $reading['dttm'] = $row['dttm'];
        $reading['value'] = $row['value'];

        $output['readings'][] = $reading;
    }

    return json_encode($output);
}

function get_temperatures_last_24h($location)
{
    global $conn;

    $output = [];

    $pin = 0;

    if ($location === 8 || $location === 9) {
        $pin = $location;
    } else {
        $output += [
            'status' => 'fail'
        ];
    }

    $sql = 'select dttm, value from CMP306_BlockThreeJSONTemps where pin = ? order by dttm desc limit 144';

    $stmt = $conn->init();

    if (!$stmt = $conn->prepare($sql)) {
        $output += [
            'status' => 'fail'
        ];
        return json_encode($output);
    }

    $stmt->bind_param('i', $pin);

    if (!$stmt->execute()) {
        $output += [
            'status' => 'fail',
            'get_status' => 'fail'
        ];
        return json_encode($output);
    }

    $output += [
        'status' => 'success',
        'insert_status' => 'success'
    ];

    return json_encode($output);
}