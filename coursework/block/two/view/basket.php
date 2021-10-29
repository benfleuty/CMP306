<?php session_start();
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
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/header.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/global-body.css">
</head>
<body>
<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/header.php"; ?>
<script src="/~1900040/cmp306/coursework/block/two/controller/basket.js"></script>
<div class="content mx-auto my-3">
    <div>
        <?php

        if (isset($_SESSION["user_id"]) && isset($_SESSION["basket"]) && !empty($_SESSION["basket"])):
        ?>
        <h2>item in basket:</h2>
        <div class="border p-2">
            <h3>title</h3>
            <p>£price</p>
            <button class="btn btn-danger" id="btnRemoveFromBasket" name="id">remove</button>
        </div>
        <?php else: ?>
        <h2>Your basket is empty</h2>
        <?php endif; ?>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/footer.php"; ?>
</body>
</html>