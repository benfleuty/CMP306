<?php session_start();

include_once "../model/api.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Product | Block Two | 1900040</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--suppress JSUnresolvedLibraryURL -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./content/css/header.css">
    <link rel="stylesheet" href="./content/css/header.css">
</head>
<body>
<?php if (isset($_SESSION["user_id"])) {
    echo "Welcome " . getUserById($_SESSION["user_id"])["username"];
} ?>

<?php include_once __DIR__ . "/content/modules/header.php"; ?>

<div class="content mx-auto my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="https://via.placeholder.com/1280x720" alt="" class="img-fluid">
            </div>
            <div class="col-md-7">
                <div class="product-title ">
                    <h2>$productTitle$</h2>
                </div>
                <div class="product-price ">
                    <span class="text-muted">$productPrice$</span>
                </div>
                <div class="product-description mt-1">
                    <span>lorem ipsum dolor sit amet.</span>
                </div>
                <form>
                    <button class="btn btn-primary">Buy Now</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include_once __DIR__ . "/content/modules/footer.php"; ?>
</body>
</html>