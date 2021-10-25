<?php session_start();

include_once "../model/api.php";


?>

<!doctype html>
<html lang="en">
<head>
    <title>Home | Block Two | 1900040</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./content/css/header.css">
</head>
<body>
<?php if (isset($_SESSION["user_id"])) {
    echo "Welcome " . getUserById($_SESSION["user_id"])["username"];
} ?>
<?php include_once __DIR__ . "/content/modules/header.php"; ?>

</body>
</html>