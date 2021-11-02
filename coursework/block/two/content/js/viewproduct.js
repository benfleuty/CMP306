$(function () {
    $(".btn-view-product").on("click", function (e) {
        e.preventDefault();
        let id = e.target.name;
        window.location.href = "/~1900040/cmp306/coursework/block/two/view/viewproduct.php?id=" + id;
    })
})