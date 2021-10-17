<?php

session_start();

?>


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

<?php include_once "../view/content/modules/html-header.html" ?>

<section class="team-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Plants</h2>
            <p class="text-center">Meet my plants</p>
            <p class="text-center">Click the restore database above to ensure you are seeing the original, unedited data.</p>
        </div>

        <!-- Display items -->
        <div class="row people">
            <div class="col-md-6 col-lg-4 item" id="new-plant">
                <div class="box">
                    <h3 class="name">Add a new plant</h3>
                    <button type="button" id="btnCardAddNewPlant" class="btn btn-primary" data-toggle="modal"
                            data-target="#newPlantModal">
                        Start >>>
                    </button>
                </div>
            </div>
            <?php
            include("../model/api.php");
            $item = getAllPlants();
            $item = json_decode($item);
            for ($i = 0; $i < sizeof($item); $i++) {
                $id = $item[$i]->id;
                $scientific_name = $item[$i]->scientific_name;
                $common_name = $item[$i]->common_name;
                $link = $item[$i]->link;
                $imageHeader = $item[$i]->image;
                $description = $item[$i]->description;

                echo "<div class=\"col-md-6 col-lg-4 item\" id=\"plant-$id\">";
                echo "<div class=\"box\">";
                echo "<img class=\"rounded-circle overflow-hidden\" src=\"/~1900040/cmp306/assets/img/plants/block1/$id/$imageHeader\" alt=\"Image of a $common_name\">";
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
<!-- Plant Modal -->
<div class="modal fade" id="plantModal" tabindex="-1" role="dialog" aria-labelledby="plantModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="description"></div>
                <div class="link"></div>
                <div class="images"></div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- Plant Info Modal END-->


<!-- New Plant Modal START -->
<!-- New Plant Modal -->
<div class="modal fade" id="newPlantModal" tabindex="-1" role="dialog" aria-labelledby="newPlantModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Plant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <label for="newPlantCommonName" class="font-weight-bold">Common Name</label>
                        <input type="text" id="newPlantCommonName" class="form-control"/>
                        <span id="newPlantCommonNameMsg"></span>
                    </div>
                    <div class="form-row">
                        <label for="newPlantScientificName" class="font-weight-bold">Scientific Name</label>
                        <input type="text" id="newPlantScientificName" class="form-control"/>
                        <span id="newPlantScientificNameMsg"></span>
                    </div>
                    <div class="form-row">
                        <label for="newPlantDescription" class="font-weight-bold">Description</label>
                        <textarea id="newPlantDescription" class="form-control"></textarea>
                        <span id="newPlantDescriptionMsg"></span>
                    </div>
                    <div class="form-row">
                        <button id="btnSaveNewPlant" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- New Plant Modal END-->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"</script>
<script src="../controller/populate-modal.js"></script>
<script src="../controller/delete-plant-modal.js"></script>
<script src="../controller/update-plant.js"></script>
<script src="../controller/edit-plant-modal.js"></script>
<script src="../controller/restore-database.js"></script>
<script src="../controller/save-new-plant.js"></script>

</body>

</html>