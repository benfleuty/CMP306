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
    <link rel="stylesheet" href="./content/css/index.css">
</head>
<body>
<?php if (isset($_SESSION["user_id"])) {
    echo "Welcome " . getUserById($_SESSION["user_id"])["username"];
} ?>
<?php include_once __DIR__ . "/content/modules/header.php"; ?>

<div class="content mx-auto my-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">$productname$</h3>
                    <img src="https://via.placeholder.com/200?text=Product+Image" alt="Image of a product" class="img-fluid rounded">
                    <p class="card-text">$price$</p>
                    <p class="card-text text-start">$description$</p>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>