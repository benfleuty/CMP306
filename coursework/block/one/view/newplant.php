<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New Plant | Block One | PLANTS!</title>
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
    <link rel="stylesheet" href="content/css/forms.css">
</head>

<body>
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
    <div class="container hero">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                <h1>Meet my plants</h1>
                <p>Help... I keep spending money</p>
                <button id="btnRestoreDatabase" class="btn btn-light btn-lg action-button" type="button">Restore
                    database
                    </button>
            </div>
            <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                <div class="phone-mockup"><img class="device" src="/~1900040/cmp306/assets/img/plants/header.png"></div>
            </div>
        </div>
    </div>
</header>

<section class="contact-clean mx-auto w-50">
    <form method="post">
        <h2 class="text-center">Add a new plant</h2>
        <div class="mb-3">
            <label for="newPlantCommonName">Common Name*:</label>
            <input id="newPlantCommonName" class="form-control" type="text" placeholder="Common Name*" required aria-required="true">
            <label for="newPlantCommonName" class="required">This field is required!</label>
        </div>
        <div class="mb-3">
            <label for="newPlantScientificName">Scientific Name*:</label>
            <input id="newPlantScientificName" class="form-control" type="text" placeholder="Scientific Name*" required aria-required="true">
            <label for="newPlantScientificName" class="required">This field is required!</label>
        </div>
        <div class="mb-3">
            <label for="newPlantLink">Link*:</label>
            <input id="newPlantLink" class="form-control" type="text" placeholder="Link*" required aria-required="true">
            <label for="newPlantLink" class="required">This field is required!</label>
        </div>
        <div class="mb-3">
            <label for="newPlantDescription">Description*:</label>
            <textarea id="newPlantDescription" class="form-control" type="text" placeholder="Enter some information about this plant!*" required aria-required="true"></textarea>
            <label for="newPlantDescription" class="required">This field is required!</label>
        </div>
        <div class="mb-3">
            <button id="btnSaveNewPlant" class="btn btn-warning w-100 btn-lg action-button" type="button" >
                Empty fields!
            </button>
        </div>
    </form>
</section>


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
<script src="../content/js/send-new-plant-data.js"></script>

</body>

</html>