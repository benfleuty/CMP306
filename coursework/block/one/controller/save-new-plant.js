$(function () {
    $("#newPlantModal #btnSaveNewPlant").on("click", function (e) {
        e.preventDefault();
        let cname = $("#newPlantModal #newPlantCommonName").val();
        let sname = $("#newPlantModal #newPlantScientificName").val();
        let desc = $("#newPlantModal #newPlantDescription").val();

        let errors = false;
        if (cname === "") {
            $("#newPlantModal #newPlantCommonNameMsg").html("You didn't enter a common name!");
            errors = true;
        } else $("#newPlantModal #newPlantCommonNameMsg").html("");

        if (sname === "") {
            $("#newPlantModal #newPlantScientificNameMsg").html("You didn't enter a scientific name!");
            errors = true;
        } else $("#newPlantModal #newPlantScientificNameMsg").html("");

        if (desc === "") {
            $("#newPlantModal #newPlantDescriptionMsg").html("You didn't enter a description!");
            errors = true;
        } else $("#newPlantModal #newPlantDescriptionMsg").html("");

        if (errors) return;

        $.ajax({
            type: "POST",
            url: '../model/add-new-plant.php',
            data: {cname: cname, sname: sname, desc: desc},
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status !== 'success') {
                    console.error("Could not save new plant!");
                    return;
                }

// add ui

                console.log("Plant added");
                location.reload();

            }
        })

    });

    $('#newPlantModal').on('hidden.bs.modal', function () {

        $("#newPlantModal #newPlantCommonNameMsg").html("");

        $("#newPlantModal #newPlantScientificNameMsg").html("");

        $("#newPlantModal #newPlantDescriptionMsg").html("");
    })
})