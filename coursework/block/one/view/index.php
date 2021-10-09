<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Block One | PLANTS!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Header-Blue.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Header-Dark.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/styles.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Team-Boxed.css">

</head>

<body>
<style>
    /* https://stackoverflow.com/questions/1638223/is-there-a-way-to-word-wrap-long-words-in-a-div
    Source: http://snipplr.com/view/10979/css-cross-browser-word-wrap */
    p {
        white-space: pre-wrap; /* CSS3 */
        white-space: -moz-pre-wrap; /* Firefox */
        white-space: -o-pre-wrap; /* Opera 7 */
        word-wrap: break-word; /* IE */
    }
</style>

<header class="header-blue">
    <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
        <div class="container-fluid"><a class="navbar-brand" href="/~1900040/cmp306/"><strong>Ben Fleuty |&nbsp;CMP
                    306</strong><br><strong>Dynamic Web Development</strong><br></a></div>
    </nav>
    <div class="container hero">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                <h1>Meet my plants</h1>
                <p>Help... I keep spending money</p>
                <button id="btnRestoreDatabase" class="btn btn-light btn-lg action-button" type="button">Restore database</button>
            </div>
            <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                <div class="phone-mockup"><img class="device" src="../image/plants/header.png"></div>
            </div>
        </div>
    </div>
</header>
<section class="team-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Plants</h2>
            <p class="text-center">Meet my plants</p>
            <p class="text-center">Click the restore database above to ensure you are seeing the original, unedited data.</p>
        </div>

        <!-- Display items -->
        <div class="row people">
            <?php
            include("../model/api-plants.php");
            $item = getAllPlants();
            $item = json_decode($item);
            for ($i = 0; $i < sizeof($item); $i++) {
                $id = $item[$i]->id;
                $scientific_name = $item[$i]->scientific_name;
                $common_name = $item[$i]->common_name;
                $keep_location = $item[$i]->keep_location;
                $description = $item[$i]->description;
                $image = $item[$i]->image;

                echo "<div class=\"col-md-6 col-lg-4 item\" id=\"plant-$id\">";
                echo "<div class=\"box\"><img class=\"rounded-circle overflow-hidden\" src=\"../image/plants/$image\">";
                echo "<h3 class=\"name\">$common_name</h3>";
                echo "<p class=\"title\">$scientific_name</p>";
                echo "<button type=\"button\" id=\"$id\" class=\"btn btn-primary plant-modal-button\" data-toggle=\"modal\" data-target=\"#plantModal\">";
                echo "Learn More";
                echo "</button>";
                echo "</div></div>";
            }
            ?>
        </div>
    </div>
</section>
<!-- Plant Info Modal START -->

<!-- Modal -->
<div class="modal fade" id="plantModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>


<!-- Plant Info Modal END-->
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="../model/populate-modal.js"></script>
<script src="../model/delete-plant-modal.js"></script>
<script src="../model/edit-plant-modal.js"></script>
<script src="../model/restore-database.js"></script>
<script src="../model/edit-plant.js"></script>

</body>

</html>