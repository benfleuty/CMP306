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
        if (check_empty_all())
            return;

        let cname = $(COMMON).val();
        let sname = $(SCIENCE).val();
        let desc = $(DESCRIPTION).val();
        let link = $(LINK).val();

            $.ajax({
                type: "POST",
                url: '../model/add-new-plant.php',
                data:{
                    cname:cname,
                    sname:sname,
                    desc:desc,
                    link:link
                },
                success: function (response) {
                    let jsonData = JSON.parse(response);
                    console.log(jsonData.status);
                }
            })
    })
})

function check_empty(inbound) {
    let id = "#" + inbound.id;
    let fail = false;

    if ($(id).val() === "") {
        fail = true;
        $(id + " + label").css("display", "block");
    } else $(id + " + label").css("display", "none");


    if (check_empty_all(false)) {
        $(saveBtn).prop("disabled", true);
        $(saveBtn).html("Empty fields!");
    } else {
        $(saveBtn).prop("disabled", false);
        $(saveBtn).html("Save plant");
    }

    return fail;
}

function check_empty_all(display = true) {
    let fail = false;

    const ids = [COMMON, SCIENCE, LINK, DESCRIPTION];

    for (let i = 0; i < ids.length; i++) {
        let id = ids[i];
        if ($(id).val() === "") {
            fail = true;
            if (display)
                $(id + " + label").css("display", "block");
        } else {
            if (display)
                $(id + " + label").css("display", "none");
        }
    }


    $(saveBtn).prop("disabled", true);

    if (fail) {
        $(saveBtn).html("Empty fields!");
    } else {
        $(saveBtn).html("Saving plant");
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

