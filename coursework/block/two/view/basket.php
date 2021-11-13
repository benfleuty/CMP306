<?php
session_start();
require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Basket | Block Two | 1900040</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/content/css/header.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/content/css/global-body.css">
</head>
<body>
<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/header.php"; ?>
<script src="/~1900040/cmp306/coursework/block/two/content/js/basket.js"></script>
<div class="content mx-auto my-3">
    <div>
        <?php

        if (isset($_SESSION["user_id"]) && isset($_SESSION["basket"]) && !empty($_SESSION["basket"])):
            $product = getProductById($_SESSION["basket"]["product_id"]);
            $product = json_decode($product, true);
            $product = $product["product"];
            ?>
            <h2>Item in basket:</h2>
            <div class="border p-2">
                <h3><?= $product["name"] ?></h3>
                <p>£<?= number_format($product["price"], 2) ?></p>
                <button class="btn btn-danger" id="btnRemoveFromBasket" name="id">remove</button>
            </div>
            <button class="btn btn-warning w-100 my-1" id="btnCheckout">Checkout</button>
        <?php else: ?>
            <h2>Your basket is empty</h2>
        <?php endif; ?>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/footer.php"; ?>
</body>
</html>