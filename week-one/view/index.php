<!DOCTYPE html>
<!-- Exam Template 	-->
<!-- version 1 2020-12-01 -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CMP306 - Dynamic Web Development 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The site uses Bootstrap v5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- add a local stylesheet -->
    <link rel="stylesheet" href="plants.css?v=20210922"/>

</head>

<body>

<!-- overall container for page -->
<div class="container">

    <!-- header row -->
    <div id="header" class="card text-center">
        <img src="../image/plants/header.jpg" alt="header image"/>
        <div class="card-img-overlay">
            <h1 class="">CMP306 Dynamic Web Development 2 | 2020-21<br/>Ben Fleuty | 1900040</h1>
        </div>
    </div><!-- Header  row -->

    <br/><!--simple way to get some space -->

    <div class="row">
        <!-- Display items -->
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

            for($j = 0; $j < sizeof($description_parts);$j++)
            {
                // If the line isn't empty, add it to the description.
                if(!empty($description_parts[$j]))
                    $description .= "<p class='card-text'>" . $description_parts[$j] . "</p>";
            }
            $image = $item[$i]->image;
            echo '<div class="col-sm-4">';
            echo '<div class="card">';
            echo '<div class="card-header">';
            echo '<h1>' . $common_name . ', <span class="muted">(' . $latin_name . ')</span></h1>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<img src="../image/plants/' . $image . '" alt="Image of ' . $common_name . '" />';
            echo '<p>' . $description . '</p>';
            echo '</div>';
            echo '<div class="card-footer">';
//            echo '<a href="' . $link . '">' . $name . '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<br/><br/>';
        }
        ?>
    </div><!-- row -->

    <!-- footer row -->
    <div id="footer" class="card text-center">
        <p>email : 1900040@abertay.ac.uk</p>
    </div><!-- Footer  row -->


</div><!-- container -->
</body>
</html>
   