<?php
session_start();
require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Checkout | Block Two | 1900040</title>
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
<script src="/~1900040/cmp306/coursework/block/two/content/js/checkout.js"></script>
<div class="content mx-auto my-3">
    <div>
        <?php
        if (!isset($_SESSION["user_id"]) || !isset($_SESSION["basket"]) || empty($_SESSION["basket"])) {
            header("Location: /~1900040/cmp306/coursework/block/two/view/index.php");
        }

        $product = getProductById($_SESSION["basket"]["product_id"]);
        $product = json_decode($product, true);
        $product = $product['product'];
        ?>
        <h1>Checkout</h1>
        <p>Item: <?= $product["name"] ?></p>
        <p>Total: £<span id="price"><?= number_format($product["price"], 2) ?></span></p>
        <p>Payments handled by Aberpay</p>
        <form id="checkoutForm">
            <div class="mb-3">
                <label for="txtCardNumber"> Card number
                    <input id="txtCardNumber" type="text" class="form-control" min="0" maxlength="16" placeholder="XXXX XXXX XXXX XXXX" required value="1234567812345678">
                </label>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" id="btnConfirmCheckout" type="submit">Pay via AberPay</button>
            </div>
        </form>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/footer.php"; ?>
</body>
</html>