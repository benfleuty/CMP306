$(function () {
    $('.plant-modal-button').on('click',function (e) {
        let plant_id = e.target.id ;
        $.ajax({
            type: "POST",
            url: '../model/get-selected-plant-desc.php',
            data: {plant_id: plant_id},
            success: function (response) {
                var jsonData = JSON.parse(response);
                let title = jsonData.common_name + " (" + jsonData.scientific_name + ")";
                let desc = jsonData.description;

                $("#plantModal .modal-title").html(title);
                $("#plantModal .modal-body").html(desc);
            }
        })

        let x = '<button type="button" id="btnDeletePlant" class="btn btn-danger modal-button" data-dismiss="modal">Delete</button>' +
            '<button type="button" id="btnEditPlant" class="btn btn-warning modal-button">Edit</button>';
       $("#plantModal .modal-footer").html(x);
    })


})