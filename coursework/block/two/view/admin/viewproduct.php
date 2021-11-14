<?php session_start();
include_once '/home/1900040/public_html/cmp306/coursework/block/two/model/api.php';
include_once '/home/1900040/public_html/cmp306/coursework/block/two/content/modules/specialusercheck.php';

$fail = !isset($_GET['id']) || empty($_GET['id']) || !ctype_digit($_GET['id']);

if (!$fail) {
    $id = $_GET['id'];

    $product = getProductById($id);
    $product = json_decode($product, true);

    if ($product["status"] === "fail") {
        die();
    }

    $product = $product["product"];
    foreach ($product as $key => $value) {
        $product[$key] = htmlspecialchars($value);
    }

    $defaultImg = $product["image"] === "https://via.placeholder.com/300";

    $imgBasePath = "";

    if (!$defaultImg) {
        $imgBasePath = "/~1900040/cmp306/coursework/block/two/img/";
    }
} else {
    die('The given product ID is not valid');
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
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/content/css/header.css">
    <link rel="stylesheet" href="/~1900040/cmp306/coursework/block/two/content/css/global-body.css">
</head>
<body>
<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/header.php"; ?>

<div class="content mx-auto my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="<?= $imgBasePath . $product["image"] ?>" alt="" class="img-fluid" style="max-height: 250px">
            </div>
            <div class="col-md-7">
                <div class="product-title ">
                    <h2><?= $product["name"] ?></h2>
                </div>
                <div class="product-price ">
                    <span class="text-muted">£<?= $product["price"] ?></span>
                </div>
                <div class="product-description mt-1">
                    <?= $product["description"] ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/footer.php"; ?>
</body>
</html>