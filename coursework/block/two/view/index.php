<?php session_start();
require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Home | Block Two | 1900040</title>
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
<script src="/~1900040/cmp306/coursework/block/two/content/js/viewproduct.js"></script>
<div class="content mx-auto my-3">
    <div class="row">
        <?php
        $products = getAllProducts();

        foreach ($products["products"] as $product) :
            $defaultImg = $product["image"] === "https://via.placeholder.com/300";

            $imgBasePath = "";

            if (!$defaultImg) {
                $imgBasePath = "/~1900040/cmp306/coursework/block/two/img/";
            }

            foreach ($product as $key => $value) {
                $product[$key] = htmlspecialchars($value);
            }
            ?>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"> <?= $product["name"] ?> </h3>
                        <img src="<?= $imgBasePath . $product["image"] ?>" alt="Image of a product"
                             class="img-fluid rounded" style="max-height:200px">
                        <?php
                        $price = $product["price"];
                        $price = number_format($price, 2);
                        ?>
                        <p class="card-text">£<?= $price ?></p>
                        <?php
                        $desc = $product["description"];

                        if (count_chars($desc) > 100) {
                            $desc = substr($desc, 0, 100);
                            $desc = trim($desc);
                            $desc .= "...";
                        }
                        ?>
                        <p class="card-text text-start"><?= $desc ?></p>
                        <form>
                            <button class="btn btn-outline-primary btn-view-product w-100" name="<?= $product["id"] ?>">
                                View
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once "/home/1900040/public_html/cmp306/coursework/block/two/content/modules/footer.php"; ?>
</body>
</html>