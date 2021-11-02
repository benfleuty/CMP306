<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>View Plant | Block One | PLANTS!</title>
    <link rel="stylesheet" href="/~1900040/cmp306/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Article-Clean.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Header-Blue.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Header-Dark.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/styles.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Team-Boxed.css">
    <link rel="stylesheet" href="../content/css/plants.css">
</head>
<header class="header-blue">
    <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
        <div class="container-fluid"><a class="navbar-brand" href="/~1900040/cmp306/">Ben Fleuty |&nbsp;CMP 306<br>Dynamic
                Web
                Development</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                        class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                                                     data-bs-toggle="dropdown">Block One</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/~1900040/cmp306/coursework/block/one">Work</a>
                            <a class="dropdown-item" href="/~1900040/cmp306/coursework/block/one/report">Report</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php
require_once "../model/api.php";

$isplant = true;
$pid = -1;
$plant = [];

if (!empty($_GET["plant_id"]) && ctype_digit($_GET["plant_id"])) {
    $pid = $_GET["plant_id"];
} else {
    $isplant = false;
}

if ($isplant):
    $plant = getPlant($pid);
    $images = $plant["images"];

    $custom = false;
    $add_carousel = false;

    if (is_array($images)) {
        $add_carousel = count($images) > 1;
    } else {
        $custom = empty($images);
    }

    $dir_base = "/~1900040/cmp306/assets/img/plants/block1/";
    $img_base = "$dir_base/$pid";

    if ($custom) {
        $img_base = "https://via.placeholder.com/150";
    }

    ?>
    <body>
    <section class="article-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center"><?= $plant["common_name"] ?> (<?= $plant["scientific_name"] ?>)</h1>
                        <p class="text-center">
                            <span class="link">
                                <a href="<?= $plant["link"] ?>">Learn more here</a>
                            </span>
                        </p>
                        <?php

                        $data = getLinkedArticles($plant["id"]);

                        if ($data["status"] === "success") {
                            $data = $data["ids"];
                        } else {
                            die;
                        }
                        ?>

                        <p class="text-center">
                            Articles linked to this plant:
                            <?php
                            for ($i = 0, $MAX = count($data); $i < $MAX; $i++):
                                ?>
                                <span class="link">
                                <a href="../view/viewarticle.php?id=<?= $data[$i] ?>">Article <?= $data[$i] ?></a>
                            </span>
                            <?php endfor; ?>
                        </p>
                        <?php if ($add_carousel): ?>
                            <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="img-fluid mx-auto d-block"
                                             src="<?= $img_base . '/' . $images[0] ?>"
                                             alt="Picture of a <?= $plant["common_name"] ?>">
                                    </div>
                                    <?php
                                    for ($i = 1, $iMax = count($images); $i < $iMax; $i++) : ?>
                                        <div class="carousel-item">
                                            <img class="img-fluid mx-auto d-block"
                                                 src="<?= $img_base . '/' . $images[$i] ?>"
                                                 alt="Picture of a <?= $plant["common_name"] ?>">
                                        </div>
                                    <?php endfor;
                                    ?>
                                </div>
                                <div>
                                    <a class="carousel-control-prev" href="#carousel-1" role="button"
                                       data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-black bg-opacity-50 rounded"></span>
                                        <span class="visually-hidden">Previous</span></a>
                                    <a class="carousel-control-next" href="#carousel-1" role="button"
                                       data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-black bg-opacity-50 rounded"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>
                                <ol class="carousel-indicators bg-black bg-opacity-50 w-25 mx-auto rounded">
                                    <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                                    <?php for ($i = 1, $iMax = count($images); $i < $iMax; $i++) : ?>
                                        <li data-bs-target="#carousel-1" data-bs-slide-to="<?= $i ?>"></li>
                                    <?php endfor; ?>
                                </ol>
                            </div>
                        <?php else: ?>
                            <img class="img-fluid mx-auto d-block" src="<?= $img_base . '/' . $images[0] ?>"
                                 alt="Picture of a <?= $plant["common_name"] ?>">
                        <?php endif; ?>
                    </div>
                    <div class="text">
                        <p><?= $plant["description"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>


<?php
else:
    echo "You have not selected a plant!";
endif;
?>

<footer class="footer-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 item text">
                <h3>Ben Fleuty | 1900040</h3>
                <p>This website is for educational purposes only. Content may be subject to copyright.</p>
            </div>
        </div>
        <p class="copyright">Ben Fleuty and whoever owns the stuff I'm... borrowing © 2021</p>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="/~1900040/cmp306/assets/bootstrap/js/bootstrap.min.js"></script>
