<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>View Article | Block One | PLANTS!</title>
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
    <link rel="stylesheet" href="content/css/plants.css">
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

$isarticle = true;
$id = -1;
$plant = [];

if (!empty($_GET["id"]) && ctype_digit($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $isarticle = false;
}

if ($isarticle):
    $article = getArticle($id);

    if ($article["status"] === "fail") {
        die;
    }

    $article = $article["article"];

    $image = $article["image"];

    $dir_base = "/~1900040/cmp306/assets/img/plants/block1";
    //$img_base = "$dir_base/$id";

    $img_base = "https://via.placeholder.com/150";

    ?>
    <body>
    <section class="article-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                    <div class="intro">
                        <h1 class="text-center"><?= $article["title"] ?></h1>
                        <p class="text-center">
                            Authored by
                            <span class="link">
                                <a><?= $article["author"] ?></a>
                            </span>
                        </p>
                      <?='<img class="img-fluid mx-auto d-block" src="'. $img_base . '" alt="Picture">' ?>
                    </div>
                    <div class="text">
                        <p><?= $article["text"] ?></p>
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
