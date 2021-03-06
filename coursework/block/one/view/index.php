<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> Home | Block One | PLANTS!</title>
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


<section class="team-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Plants</h2>
            <p class="text-center">Meet my plants</p>
            <p class="text-center">Click the restore database above to ensure you are seeing the original, unedited
                data. The Snake Plant has multiple images.</p>
        </div>

        <!-- Display items -->
        <div class="row people">
            <?php
            include("../model/api.php");
            $item = getAllPlants();
            $item = json_decode($item, true);
            for ($i = 0, $iMax = count($item);
                 $i < $iMax;
                 $i++) :
                $id = $item[$i]["id"];
                $scientific_name = $item[$i]["scientific_name"];
                $common_name = $item[$i]["common_name"];
                $link = $item[$i]["link"];
                $imageHeader = $item[$i]["image"];
                $description = $item[$i]["description"];
                $description = trim(substr($description, 0, 99)) . "...";
                ?>
                <div class="col-md-6 col-lg-4 item" id="plant-<?= $id ?>">
                    <div class="box">
                        <?php
                        if (!is_null($imageHeader)) {
                            ?>
                            <img class="img-thumbnail overflow-hidden"
                                 src="/~1900040/cmp306/assets/img/plants/block1/<?= $id ?>/<?= $imageHeader ?>"
                                 alt="Image of a <?= $common_name ?>">
                            <?php
                        } else {
                            ?>
                            <img class=" img-thumbnail overflow-hidden" src="https://via.placeholder.com/150"
                                 alt="Image of a <?= $common_name ?>">
                            <?php
                        }
                        ?>
                        <h3 class="name"><?= $common_name ?></h3>
                        <p class="title"><?= $scientific_name ?></p>
                        <p><?= $description ?> </p>
                        <button type="button" class="btn btn-primary plant-button" id="<?= $id ?>">
                            Learn more
                        </button>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
<footer class="footer-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 item text">
                <h3>Ben Fleuty | 1900040</h3>
                <p>This website is for educational purposes only. Content may be subject to copyright.</p>
            </div>
        </div>
        <p class="copyright">Ben Fleuty and whoever owns the stuff I'm... borrowing ?? 2021</p>
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="/~1900040/cmp306/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../content/js/plant-learn-more.js"></script>

</body>

</html>