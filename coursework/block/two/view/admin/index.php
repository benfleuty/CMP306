<?php session_start();
include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
if (!isset($_SESSION["user_id"]) || !isSpecialUserByID($_SESSION["user_id"])) {
    header("Location: /~1900040/cmp306/coursework/block/two/view/index.php");
}
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
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/header.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/global-body.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/admin.css">
</head>
<body>
<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/header.php"; ?>

<div class="content mx-auto my-3">
    <?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/admin/admin-products-options.php"; ?>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/footer.php"; ?>
</body>
</html>