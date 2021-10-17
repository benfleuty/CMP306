$(function () {
    $("#plantModal").on("click", "#btnSavePlant", function () {
        let text = $("#plantDescription").val();
        let link = $("#plantLinkText").val().toLowerCase();
        // Force new root
        if (link.startsWith("//") === false)
            link = `//${link}`;
        
        $.ajax({
            type: "POST",
            url: '../model/update-plant.php',
            data: {
                text: text,
                link: link
            },
            success: function (response) {
                let jsonData = JSON.parse(response);
                if (jsonData.status !== 'success') {
                    console.error("Update error: Error updating description!");
                    return;
                }
                console.log("Description updated");
                $("#plantModal .modal-body > .description").html(text);
                $("#plantModal .modal-body > .link").html(`<a target="_blank">Click here to learn more!</a></div>`);
                $("#plantModal .modal-body > .link > a").attr("href", link);
                let deleteButton = '<button type="button" id="btnDeletePlant" class="btn btn-danger modal-button">Delete</button>';
                let editButton = '<button type="button" id="btnEditPlant" class="btn btn-warning modal-button">Edit</button>';
                let content = deleteButton + editButton;
                $("#plantModal .modal-footer").html(content);
            }
        })
    })
})