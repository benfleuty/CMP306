<?php
session_start();

$header_location = "Location: view/index.php";

class redirect_locations
{
    const employee_index = "employee_index";
}

if (isset($_SESSION["redirect_from"])) {
    switch($_SESSION["redirect_from"])
    {
        case redirect_locations::employee_index:
            $header_location = "Location: view/employeeSignIn.php";
            break;

        default:
            $header_location = "Location: view/index.php";
            break;
    }
}

header($header_location);