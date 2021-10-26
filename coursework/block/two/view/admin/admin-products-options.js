$(function () {

    $("#viewAllProducts").on("click",function () {
        window.location.href = "admin/viewproducts.php";
    });

    $("#viewProduct").on("click",function () {
        window.location.href = "admin/viewproduct.php";
    });

    $("#editProduct").on("click",function () {
        window.location.href = "admin/editproduct.php";
    });

    $("#deleteProduct").on("click",function () {
        window.location.href = "admin/deleteproduct.php";
    });

})