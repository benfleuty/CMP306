$(function () {
    $('.plant-modal-button').on('click', function (e) {
        let pid = e.target.id;
        $.ajax({
            type: "POST",
            url: '../model/load-plant.php',
            data: {plant_id: pid},
            success: function (response) {
                let jsonData = JSON.parse(response);
                let title = jsonData.common_name + " (" + jsonData.scientific_name + ")";
                let desc = jsonData.description;

                $("#plantModal .modal-title").html(title);
                $("#plantModal .modal-body").html(desc);
            }
        })

        let x = '<button type="button" id="btnDeletePlant" class="btn btn-danger modal-button">Delete</button>' +
            '<button type="button" id="btnEditPlant" class="btn btn-warning modal-button">Edit</button>';
        $("#plantModal .modal-footer").html(x);
    })


})