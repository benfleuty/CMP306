<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Week One | Plants</title>
    <link rel="stylesheet" href="/~1900040/cmp306/assets/bootstrap/css/bootstrap.min.css">
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
<style>
    /* https://stackoverflow.com/questions/1638223/is-there-a-way-to-word-wrap-long-words-in-a-div
    Source: http://snipplr.com/view/10979/css-cross-browser-word-wrap */
    p {
        white-space: pre-wrap;      /* CSS3 */
        white-space: -moz-pre-wrap; /* Firefox */
        white-space: -o-pre-wrap;   /* Opera 7 */
        word-wrap: break-word;      /* IE */
    }
</style>
<body>


<header class="header-blue">
    <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
        <div class="container-fluid"><a class="navbar-brand" href="../../"><strong>Ben Fleuty |&nbsp;CMP 306</strong><br><strong>Dynamic Web Development</strong><br></a></div>
    </nav>
    <div class="container hero">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                <h1>Meet my plants</h1>
                <p>Help... I keep spending money</p>
            </div>
            <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                <div class="phone-mockup"><img class="device" src="../../assets/img/plants/header.png" alt="picture of a plant"></div>
            </div>
        </div>
    </div>
</header>
<section class="team-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Plants</h2>
            <p class="text-center">Meet my plants</p>
        </div>

        <!-- Display items -->
        <div class="row people">
            <?php
            include("../model/api-plants.php");
            $item = getAllPlants();
            $item = json_decode($item);
            for ($i = 0; $i < sizeof($item); $i++) {
                $latin_name = $item[$i]->latin_name;
                $common_name = $item[$i]->common_name;
                $keep_location = $item[$i]->keep_location;
                $description_parts = preg_split("/\r\n|\n|\r/", $item[$i]->description);
                $description = "";

                for ($j = 0; $j < sizeof($description_parts); $j++) {
                    // If the line isn't empty, add it to the description.
                    if (!empty($description_parts[$j]))
                        $description .= "<p class='card-text'>" . $description_parts[$j] . "</p>";
                }
                $image = $item[$i]->image;
                echo "<div class=\"col-md-6 col-lg-4 item\">";
                echo "<div class=\"box\"><img class=\"rounded-circle overflow-hidden\" src=\"/~1900040/cmp306/assets/img/plants/$image\" alt=\"Image of a $common_name\">";
                echo "<h3 class=\"name\">$common_name</h3>";
                echo "<p class=\"title\">$latin_name</p>";
                echo "<p class=\"description\">$description</p>";
                echo "</div></div>";
            }
            ?>
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
        <p class="copyright">Ben Fleuty and whoever owns the stuff I'm... borrowing © 2021</p>
    </div>
</footer>
<script src="/~1900040/cmp306/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>