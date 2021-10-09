$(function () {
    $("#plantModal").on("click", "#btnDeletePlant", function () {
        let complete = false;

        $.ajax({
            type: "POST",
            url: '../model/delete-plant.php',
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.status === 'success') complete = true;

                $("#plantModal").modal("hide");

                if(!complete){
                    // error message
                    console.error("Could not delete plant!");
                    return;
                }
                // Otherwise successful deletion
                console.log("Plant successfully deleted");
            }
        })


    })
})