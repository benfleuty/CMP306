<?php
session_start();
require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";

if (!isset($_GET["status"])){
    die;
}

unset($_SESSION["basket"]);

$status = $_GET["status"] == 1;
?>

<!doctype html>
<html lang="en">
<head>
    <title>Order Confirmation | Block Two | 1900040</title>
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
        $product = getProductById($_SESSION["basket"]["product_id"])["product"];
        if($status):
        ?>
        <h1>Order confirmed</h1>
        <?php else: ?>
        <h1>Order failed</h1>
        <?php endif; ?>
        <p>Item: <?= $product["name"] ?></p>
        <p>Total: £<?= number_format($product["price"], 2) ?></p>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/footer.php"; ?>
</body>
</html>