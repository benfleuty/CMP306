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
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/header.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/global-body.css">
</head>
<body>
<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/header.php"; ?>
<script src="/~1900040/cmp306/coursework/block/two/controller/checkout.js"></script>
<div class="content mx-auto my-3">
    <div>
        <?php
        if (!isset($_SESSION["user_id"]) || !isset($_SESSION["basket"]) || empty($_SESSION["basket"])) {
            header("Location: /~1900040/cmp306/coursework/block/two/view/index.php");
        }

        $product = getProductById($_SESSION["basket"]["product_id"])["product"];
        ?>
        <h1>Checkout</h1>
        <p>Item: <?= $product["name"] ?></p>
        <p>Total: £<?= number_format($product["price"], 2) ?></p>
        <p>Payments handled by Aberpay</p>
        <form>
            <div class="mb-3">
                <label for="txtCardNumber"> Card number
                    <input id="txtCardNumber" type="number" class="form-control" min="0" minlength="16" maxlength="16" placeholder="XXXX XXXX XXXX XXXX">
                </label>
            </div>
            <div class="mb-3">
                <label for="txtSortCode"> Sort code
                    <input id="txtSortCode" type="number" class="form-control" min="0" minlength="6" maxlength="6" placeholder="XX-XX-XX">
                </label>
            </div>
            <div class="mb-3">
                <label for="txtCVC" > CVC
                    <input id="txtCVC" type="number" class="form-control" min="0" minlength="3" maxlength="3" placeholder="XXX">
                </label>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" id="btnConfirmCheckout">Complete transaction</button>
            </div>
        </form>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/footer.php"; ?>
</body>
</html>