var modal = document.querySelector(".modal");
var trigger = document.querySelector(".trigger");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", function (event){if (event.target === modal) {toggleModal();}});


function addUser(event){
    event.preventDefault();
    var username = $("#addUsrName").val();
    var admin = $("#addUsrAdmin").val();
    var email = $("#addUsrEmail").val();
    var options = {
        style: {
            main: {
                background: "pink",
                color: "black"
            }
        }
    };
    if(username !== "" && email !==""){
        var request = $.ajax ({
            type: "POST",
            url: "../admin/add_user.php",
            data: {
                username: username,
                admin: admin,
                email: email
            },
            success:function(response) {
                if (response === "new_user_added"){
                    iqwerty.toast.Toast("User added!");
                } else if (response === "invalid_email"){
                    console.log("Invalid email");
                    iqwerty.toast.Toast("Invalid email!");
                } else if (response === "email_error"){
                    console.log("Email is already registered!");
                    iqwerty.toast.Toast("Email is already registered!");
                } else if (response === "username_error"){
                    console.log("Username is taken!");
                    iqwerty.toast.Toast("Username is taken!");
                } else {
                    console.log("Server error: ", JSON.stringify(response));
                    iqwerty.toast.Toast("Error!");
                }
            },
            error: (error) => {
                console.log(username, admin, email);
                console.log("No/False response Error: ", JSON.stringify(error));
            }
        });
        request.done(function (data){
            $("#content2").load(location.href+" #content2>*","");
        });
    } else {
        iqwerty.toast.Toast("Please, fill all the details!", options);
    }
    //return false;
}