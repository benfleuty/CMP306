<?php session_start();
include_once "../model/api.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Admin | Block Two | 1900040</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./content/css/header.css">
    <link rel="stylesheet" href="./content/css/global-body.css">
    <link rel="stylesheet" href="./content/css/admin.css">
</head>
<body>
<?php include_once __DIR__ . "/content/modules/header.php"; ?>

<div class="content mx-auto my-3">
    <?php include_once __DIR__ . "/admin-products-options.php"; ?>
</div>

<?php include_once __DIR__ . "/content/modules/footer.php"; ?>
</body>
</html>