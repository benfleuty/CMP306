<?php
session_start();
$_SESSION["redirect_from"] = "employee_index";

header("Location: ../../index.php");
