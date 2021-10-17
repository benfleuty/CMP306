$(function () {
    let og_text = "";
    let og_link = "";
    let plantModal = $("#plantModal");
    plantModal.on("click", "#btnEditPlant", function () {
        let modalDescription = $("#plantModal .modal-body > .description");
        let modalLink = $("#plantModal .modal-body > .link");
        let modalLinkAnchor = $("#plantModal .modal-body > .link a");
        // Get text to edit
        let descText = modalDescription.html();
        // Get link to edit
        let linkText = modalLinkAnchor.attr("href");
        // store backup for reset
        og_text = descText;
        og_link = linkText;
        // Replace text with textarea and text
        let descTextarea = "<label for=\"plantDescription\">Description:</label><textarea id=\"plantDescription\" style=\"width: 100%;min-height: 150px\">" + descText + "</textarea>";
        modalDescription.html(descTextarea);

        let linkTextarea = `<label for="plantLinkText">Link:</label><input class="d-inline-block w-100" type="text" id="plantLinkText" value="${linkText}">`;
        modalLink.html(linkTextarea);

        // Replace edit button with save
        let saveBtn = `<button type="button" id="btnSavePlant" class="btn btn-success">Save</button>`;
        $("#btnEditPlant").replaceWith(saveBtn);

        // Replace delete button with reset
        let resetBtn = '<button type="button" id="btnResetPlant" class="btn btn-danger">Reset</button>';
        $("#btnDeletePlant").replaceWith(resetBtn);
    })

    plantModal.on("click", "#btnResetPlant", function () {
        $("#plantDescription").val(og_text);
        $("#plantLinkText").val(og_link);
    })
})