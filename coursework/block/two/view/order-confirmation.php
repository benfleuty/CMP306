<?php
session_start();
require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
if (!isset($_SESSION["transaction"])) {
    header("Location: /~1900040/cmp306/coursework/block/two/view/index.php");
}
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
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/content/css/header.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/content/css/global-body.css">
</head>
<body>
<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/header.php"; ?>
<div class="content mx-auto my-3">
    <div>
        <?php
        $product = getProductByTransactionId($_SESSION["transaction"]["api-response"]["id"])["product"];
        $status = $_SESSION["transaction"]["aberpay-response"]["status"];
        if ($status):
            ?>
            <h1>Order confirmed</h1>
        <?php else: ?>
            <h1>Order failed</h1>
        <?php endif; ?>
        <p>Item: <?= $product["name"] ?></p>
        <p>Total: £<?= number_format($product["price"], 2) ?></p>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/footer.php"; ?>
</body>
</html>
<?php
unset($_SESSION["basket"],$_SESSION["transaction"]);
