<?php session_start();

include_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Delete Product | Admin | Block Two | 1900040</title>
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
                <img src="https://via.placeholder.com/1280x720" alt="" class="img-fluid">
            </div>
            <div class="col-md-7">
                <form>
                    <h2 class="text-center">Edit product</h2>
                    <span class="plant-id d-none"></span>
                    <div class="mb-3 w-100">
                        <label for="txtProductTitle">Product Title:
                            <input type="text" id="txtProductTitle" class="form-control" required aria-required="true">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="txtProductPrice">Product Price:
                            <input type="text" id="txtProductPrice" class="form-control" required aria-required="true">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="txtProductDescription">Product Description:
                            <textarea type="text" id="txtProductDescription" class="form-control" required aria-required="true"></textarea>
                        </label>
                    </div>
                    <div>
                        <button class="btn btn-primary w-100 mb-3" id="btnSaveProduct">Save</button>
                        <button class="btn btn-warning w-100" id="btnResetForm">Reset Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/view/content/modules/footer.php"; ?>
</body>
</html>