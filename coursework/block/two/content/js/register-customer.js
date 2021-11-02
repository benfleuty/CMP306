$(function () {
    let registerButton = $("#btnRegister");

    $(registerButton).on("click", function (e) {
        e.preventDefault();
        let fname = $("#firstNameInput").val();
        let lname = $("#lastNameInput").val();
        let uname = $("#usernameInput").val();
        let pword = $("#passwordInput").val();
        let pword2 = $("#confirmPasswordInput").val();
        let match = pword === pword2;

        if (!fname.length || !lname.length || !uname.length || !pword.length || !pword2.length) {
            document.forms[0].reportValidity();
        }

        if (!match) {
            alert("Your passwords do not match!");
            return;
        }

        $.ajax({
            type: "POST",
            url: '/~1900040/cmp306/coursework/block/two/controller/register-user.php',
            data: {
                fname: fname,
                lname: lname,
                uname: uname,
                pword: pword
            },
            success: function (response) {
                console.log(response);
                let jsonData = JSON.parse(response);
                console.log(jsonData);
                let fail = false;
                if (jsonData.status === "fail") {
                    console.error(jsonData.message);
                    fail = true;
                }

                if (fail) {
                    alert("There was an error and you were not registered!");
                    return;
                }
                window.location.href = "/~1900040/cmp306/coursework/block/two/view/index.php";
            },
            error: function (a, b, c) {
                console.log(c);
            }
        })
    })


    $('[name="signIn"]').on("click", function (e) {
        e.preventDefault();
        window.location.href = "/~1900040/cmp306/coursework/block/two/view/login.php";
    });
})