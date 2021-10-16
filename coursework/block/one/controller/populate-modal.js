$(function () {
    $('.plant-modal-button').on('click', function (e) {
        let pid = e.target.id;
        $.ajax({
            type: "POST",
            url: '../model/load-plant.php',
            data: {plant_id: pid},
            success: function (response) {
                let jsonData = JSON.parse(response);
                let title = jsonData.common_name + " (" + jsonData.scientific_name + ")";
                let desc = jsonData.description;
                let link = jsonData.link;
                let images = jsonData.images;

                $("#plantModal .modal-title").html(title);
                $("#plantModal .modal-body > .description").html(desc);
                $("#plantModal .modal-body > .link > a").attr("href", link);

                let out;
                if (images.length === 1)
                    out = makeImage(pid, images[0]);
                else out = makeCarousel(pid, images);

                $("#plantModal .modal-body > .images").html(out);

            }
        })

        let deleteButton = '<button type="button" id="btnDeletePlant" class="btn btn-danger modal-button">Delete</button>';
        let editButton = '<button type="button" id="btnEditPlant" class="btn btn-warning modal-button">Edit</button>';
        let content = deleteButton + editButton;

        $("#plantModal .modal-footer").html(content);
    })
});


function makeCarousel(pid, images) {
    let code = "<div id=\"carouselIndicators\" class=\"carousel slide\" data-ride=\"carousel\"><ol class=\"carousel-indicators\">";
    code += "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>"

    for (let i = 1; i < images.length; i++) {
        code += "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"" + i + "\"></li>"
    }


    code += "</ol><div class=\"carousel-inner\">";
    for (let i = 0; i < images.length; i++) {
        code += newCarouselItem(pid, images[i], i === 0);
    }

    code += "<a class=\"carousel-control-prev\" href=\"#carouselIndicators\" role=\"button\" data-slide=\"prev\"> <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span> <span class=\"sr-only\">Previous</span> </a> <a class=\"carousel-control-next\" href=\"#carouselIndicators\" role=\"button\" data-slide=\"next\"> <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span> <span class=\"sr-only\">Next</span> </a></div>";
    return code;
}

function makeImage(id, src) {
    return "<img class=\"img-fluid mx-auto d-block\" src=\"/~1900040/cmp306/assets/img/plants/block1/" + id + "/" + src + "\" alt=\"Second slide\">";
}

function newCarouselItem(id, src, active = false) {
    if (active)
        return " <div class=\"carousel-item active\"><img class=\"d-block w-100\" src=\"/~1900040/cmp306/assets/img/plants/block1/" + id + "/" + src + "\" alt=\"Second slide\"></div>";
    return " <div class=\"carousel-item\"><img class=\"d-block w-100\" src=\"/~1900040/cmp306/assets/img/plants/block1/" + id + "/" + src + "\" alt=\"Second slide\"></div>";
}