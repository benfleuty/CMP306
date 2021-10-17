let COMMON = "#newPlantCommonName";
let SCIENCE = "#newPlantScientificName";
let LINK = "#newPlantLink";
let DESCRIPTION = "#newPlantDescription";
let saveBtn = "#btnSaveNewPlant";

$(function () {
    $(".form-control").on("input", function (e) {
        if (check_empty(e.target)) {
            $(saveBtn).prop("disabled", true);
        }
        switch (e.target.id) {
            case "newPlantCommonName":
                validate_common(e.target);
                break;
            case "newPlantScientificName":
                break;
            case "newPlantLink":
                break;
            case "newPlantDescription":
                break;
        }
    })
    $(saveBtn).on("click", function (e) {
        alert();
    })
})

function check_empty(inbound) {
    let id = "#" + inbound.id;
    let fail = false;

    if ($(id).val() === "") {
        fail = true;
        $(id + " + label").css("display", "block");
    } else $(id + " + label").css("display", "none");


    if (fail) {
        $(saveBtn).prop("disabled", true);
        $(saveBtn).html("Empty fields!");
    } else {
        $(saveBtn).prop("disabled", false);
        $(saveBtn).html("Save plant");
    }

    return fail;
}

function validate_common(inbound) {
}

function validate_science(inbound) {

}

function validate_link(inbound) {

}

function validate_description(inbound) {

}

