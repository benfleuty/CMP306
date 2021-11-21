<?php ?>

<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<header>
    <div class="jumbotron mb-0">
        <h1 class="display-3">Block Three</h1>
        <p class="lead">Internet of Things</p>
        <hr class="my-2">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="../report" role="button">View the report</a>
        </p>
    </div>
    <nav class="navbar navbar-expand navbar-light bg-light my-0">
        <div class="nav navbar-nav">
            <a class='nav-item nav-link' href='../../one'>Block One</a>
            <a class='nav-item nav-link' href='../../two'>Block Two</a>
            <a class="nav-item nav-link active" href="../">Block Three <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="../../four">Block Four</a>
        </div>
    </nav>
</header>

<section>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Red LED</h3>
                    <button class="btn btn-primary btn-red-led" name="on">Turn on</button>
                    <button class="btn btn-danger btn-red-led" name="off">Turn off</button>
                </div>
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>Green LED</h3>
                    <button class='btn btn-success btn-green-led' name='on'>Turn on</button>
                    <button class='btn btn-danger btn-green-led' name='off'>Turn off</button>
                </div>
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>Internal temperature</h3>
                    <ul>
                        <li>temps</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class='col-sm-4'>
            <div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>External Temperature</h3>
                    <ul>
                        <li>temps</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>