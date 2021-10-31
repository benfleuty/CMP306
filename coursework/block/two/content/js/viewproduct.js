$(function(){
    $(".btn-view-product").on("click",function (e) {
        e.preventDefault();
        let id = e.target.id.split('-')[1];
        window.location.href = "/~1900040/cmp306/coursework/block/two/view/viewproduct.php?id=" + id;
    })
})