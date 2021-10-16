$(function () {
    $("#plantModal").on("click", "#btnSavePlant", function () {
        let text = $("#plantDescription").val();
        $.ajax({
            type: "POST",
            url: '../model/edit-plant.php',
            data: {text:text},
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status !== 'success') {
                    console.error("Update error: Error updating description!");
                    return;
                }
                console.log("Description updated");

                $("#plantModal .modal-body > .description").html(text);



                let deleteButton = '<button type="button" id="btnDeletePlant" class="btn btn-danger modal-button">Delete</button>';
                let editButton = '<button type="button" id="btnEditPlant" class="btn btn-warning modal-button">Edit</button>';
                let content = deleteButton + editButton;
                $("#plantModal .modal-footer").html(content);
            }
        })
    })
})