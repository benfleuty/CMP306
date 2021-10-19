let COMMON = "#editPlantCommonName";
let SCIENCE = "#editPlantScientificName";
let LINK = "#editPlantLink";
let DESCRIPTION = "#editPlantDescription";
let saveBtn = "#btnSaveEditPlant";

$(function () {
    $(".form-control").on("input", function (e) {
        if (check_empty(e.target)) {
            $(saveBtn).prop("disabled", true);
        }
    });


    $(saveBtn).on("click", function (e) {
        if (check_empty_all())
            return;

        let cname = $(COMMON).val();
        let sname = $(SCIENCE).val();
        let desc = $(DESCRIPTION).val();
        let link = $(LINK).val();

        link = "//" + link;


        $.ajax({
            type: "POST",
            url: '../model/edit-plant.php',
            data: {
                cname: cname,
                sname: sname,
                desc: desc,
                link: link
            },
            success: function (response) {
                let jsonData = JSON.parse(response);
                let fail = false;
                if (jsonData.create_status === "fail") {
                    console.error("Error creating new plant");
                    fail = true;
                }

                if (jsonData.get_id_status === "fail") {
                    console.error("Error getting new plant id");
                    fail = true;
                }

                if (jsonData.plant_id === "" || jsonData.plant_id === null || isNaN(parseInt(jsonData.plant_id))) {
                    console.error("Error: incorrect plant id: " + jsonData.plant_id);
                    fail = true;
                }

                if(fail){
                    alert("There was an error and your action could not be processed!")
                    resetForm();
                    return;
                }

                window.location.href = "viewplant.php?plant_id=" + jsonData.plant_id;
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
    $("input, textarea").val("");
    $(saveBtn).html("Save Plant");
    $(saveBtn).prop("disabled",false);
}