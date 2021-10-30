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

    foreach ($product as $key => $value) {
        $product[$key] = htmlspecialchars($value);
    }

    $product["price"] = number_format($product["price"], 2);
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Edit Product | Admin | Block Two | 1900040</title>
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
<script src="/~1900040/cmp306/coursework/block/two/controller/edit-product.js"></script>

<div class="content mx-auto my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="<?= $imgBasePath . $product["image"] ?>" alt="" class="img-fluid" style="max-height: 250px">
            </div>
            <div class="col-md-7">
                <form>
                    <h2 class="text-center">Edit product</h2>
                    <span class="plant-id d-none"></span>
                    <div class="mb-3 w-100">
                        <label for="txtProductTitle" class="w-100">Product Title:
                            <input type="text" id="txtProductTitle" class="form-control" required aria-required="true"
                                   placeholder="<?= $product["name"] ?>" value="<?= $product["name"] ?>">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="txtProductPrice" class="w-100">Product Price:
                            <input type="text" id="txtProductPrice" class="form-control"
                                   placeholder="<?= $product["price"] ?>" value="<?= $product["price"] ?>" required
                                   aria-required="true">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="txtProductDescription" class="w-100">Product Description:
                            <textarea type="text" id="txtProductDescription" class="form-control" required
                                      style="min-height: 250px"
                                      aria-required="true"
                                      placeholder="<?= $product["description"] ?>"><?= $product["description"] ?></textarea>
                        </label>
                    </div>
                    <div>
                        <button class="btn btn-primary w-100 mb-1" id="btnSaveProduct" name="<?= $id ?>">Save</button>
                        <button class="btn btn-warning w-100" id="btnResetProductForm">Reset Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/footer.php"; ?>
</body>
</html>