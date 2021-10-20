let COMMON = "#editPlantCommonName";
let SCIENCE = "#editPlantScientificName";
let LINK = "#editPlantLink";
let DESCRIPTION = "#editPlantDescription";
let saveBtn = "#btnSaveEditPlant";

$(function () {

    let og_cname = $(COMMON).val();
    let og_sname = $(SCIENCE).val();
    let og_desc = $(DESCRIPTION).val();
    let og_link = $(LINK).val();

    $(".form-control").on("input", function (e) {
        if (check_empty(e.target)) {
            $(saveBtn).prop("disabled", true);
        }
    });


    $(saveBtn).on("click", function (e) {
        if (check_empty_all()) {
            return;
        }

        let cname = $(COMMON).val();
        let sname = $(SCIENCE).val();
        let desc = $(DESCRIPTION).val();
        let link = $(LINK).val();
        let id = $(".plant-id").html();

        link = "//" + link;


        $.ajax({
            type: "POST",
            url: '../model/update-plant.php',
            data: {
                pid: id,
                cname: cname,
                sname: sname,
                desc: desc,
                link: link
            },
            success: function (response) {
                let jsonData = JSON.parse(response);
                let fail = false;
                if (jsonData.update_status === "fail") {
                    console.error("Error updating new plant");
                    fail = true;
                }

                if (fail) {
                    alert("There was an error and your action could not be processed!")
                    resetForm();
                    return;
                }

                window.location.href = "viewplant.php?plant_id=" + id;
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

function resetForm() {
    window.location.href = "editplant.php?plant_id=" + id;
}