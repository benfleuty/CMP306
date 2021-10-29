<?php session_start();
include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $fail = false;
    if (empty($id)) {
        // id is empty
        $fail = true;
    }

    if (!ctype_digit($id)) {
        // id is not a number
        $fail = true;
    }


    if ($fail) {
        die();
    }

    $product = getProductById($id);
    if ($product["status"] === "fail") {
        die();
    }

    $product = $product["product"];
    $defaultImg = $product["image"] === "https://via.placeholder.com/300";

    $imgBasePath = "";

    if (!$defaultImg) {
        $imgBasePath = "/~1900040/cmp306/coursework/block/two/img/";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>View Product | Admin | Block Two | 1900040</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--suppress JSUnresolvedLibraryURL -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/header.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/view/content/css/global-body.css">
</head>
<body>
<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/header.php"; ?>

<div class="content mx-auto my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="<?= $imgBasePath . $product["image"] ?>" alt="" class="img-fluid float-end" style="max-height: 250px">
            </div>
            <div class="col-md-7">
                <div class="product-title ">
                    <h2><?= $product["name"] ?></h2>
                </div>
                <div class="product-price ">
                    <span class="text-muted"><?= $product["price"] ?></span>
                </div>
                <div class="product-description mt-1">
                    <?= $product["description"] ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/footer.php"; ?>
</body>
</html>