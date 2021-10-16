$(function () {
    let og_text = "";
    var plantModal = $("#plantModal");
    plantModal.on("click", "#btnEditPlant", function () {
        // Store modal for access
        var modalDescription = $("#plantModal .modal-body > .description");
        // Get text to edit
        let text = modalDescription.html();
        // store backup for reset
        og_text = text;
        // Replace text with textarea and text
        let tb = "<textarea id=\"plantDescription\" style=\"width: 100%;min-height: 150px\">" + text + "</textarea>";
        modalDescription.html(tb);

        // Replace edit button with save
        let saveBtn = '<button type="button" id="btnSavePlant" class="btn btn-success">Save</button>';
        $("#btnEditPlant").replaceWith(saveBtn);

        // Replace delete button with reset
        let resetBtn = '<button type="button" id="btnResetPlant" class="btn btn-danger">Reset</button>';
        $("#btnDeletePlant").replaceWith(resetBtn);
    })

    plantModal.on("click", "#btnResetPlant", function () {
        $("#plantDescription").val(og_text);
    })
})