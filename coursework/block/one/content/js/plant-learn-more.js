$(function () {
    $(".plant-button").on("click",function (e) {
        e.preventDefault();
        let id = e.target.id;
        window.location.href = "../view/viewplant.php?plant_id=" + id;
    })
})