$(function () {
    $("#btnDeletePlant").on("click", function (e) {
        e.preventDefault();
        if (!confirm("Are you sure?"))
            return;

        let id = $(".plant-id").html();

        $.ajax({
            type: "POST",
            url: '../model/delete-plant.php',
            data: {pid: id},
            success: function (response) {
                let jsonData = JSON.parse(response);
                let fail = false;
                if (jsonData.delete_status === "fail") {
                    console.error("Error deleting plant");
                    fail = true;
                }

                if (fail) {
                    alert("There was an error and your action could not be processed!")
                    return;
                }

                window.location.href = "../view/index.php";
            }
        })
    })
})