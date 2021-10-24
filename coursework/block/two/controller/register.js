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

        if (!match) {
            alert("Your passwords do not match!");
            return;
        }

        $.ajax({
            type: "POST",
            url: '../model/register-user.php',
            data: {
                fname: fname,
                lname: lname,
                uname: uname,
                pword: pword
            },
            success: function (response) {
                let jsonData = JSON.parse(response);
                let fail = false;
                if (jsonData.status === "fail") {
                    console.error(jsonData.message);
                    fail = true;
                }

                if (fail) {
                    alert("There was an error and you were not registered!");
                    return;
                }

                window.location.href = "index.php";
            }
        })
    })
})