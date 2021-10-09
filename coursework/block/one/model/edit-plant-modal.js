$(function () {
    let og_text = ""
    $("#plantModal").on("click","#btnEditPlant", function () {
        // Store modal for access
        var modal = $("#plantModal .modal-body");
        // Get text to edit
        let text = modal.html();
        // store backup for reset
        og_text = text;
        // Replace text with textarea and text
        let tb = "<textarea style='width: 100%;min-height: 150px'>" + text + "</textarea>";
        modal.html(tb);

        // Replace edit button with save
        let saveBtn = '<button type="button" id="btnSavePlant" class="btn btn-success">Save</button>';
        $("#btnEditPlant").replaceWith(saveBtn);

        // Replace delete button with reset
        let resetBtn = '<button type="button" id="btnResetPlant" class="btn btn-danger">Reset</button>';
        $("#btnDeletePlant").replaceWith(resetBtn);
    })
})