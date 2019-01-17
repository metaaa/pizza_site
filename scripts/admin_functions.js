function promoteToAdmin(event, userId){
    event.preventDefault();
    var request = $.ajax({
        url: "../admin/userHandling.php",
        type: "GET",
        data: {
            id: userId,
            method: "promote"
        },
        success: function (response) {
            if (response == "promoted"){
                iqwerty.toast.Toast("User promoted!");
            } else {
                iqwerty.toast.Toast("Error!");
            }
        }
    });
    request.done(function (data){
        $("#content2").load(location.href+" #content2>*","");
    });
}

function downgradeUser(event, userId){
    event.preventDefault();
    var request = $.ajax({
        url: "../admin/userHandling.php",
        type: "GET",
        data: {
            id: userId,
            method: "downgrade"
        },
        success: function (response) {
            if (response == "downgraded"){
                iqwerty.toast.Toast("User downgraded!");
            } else {
                iqwerty.toast.Toast("Error!");
            }
        }
    });
    request.done(function (data){
        $("#content2").load(location.href+" #content2>*","");
    });
}

function deleteUser(event, userId){
    event.preventDefault();
    var request = $.ajax({
        url: "../admin/userHandling.php",
        type: "GET",
        data: {
            id: userId,
            method: "delete"
        },
        success: function (response) {
            if (response == "deleted"){
                iqwerty.toast.Toast("User deleted!");
            } else {
                iqwerty.toast.Toast("Error!");
            }
        }
    });
    request.done(function (data){
        $("#content2").load(location.href+" #content2>*","");
    });
}

function addUser(event){
    //event.preventDefault();
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
    console.log(username, admin, email);
    if(username !== "" && email !==""){
        var request = $.ajax ({
            type:'POST',
            url:'admin/add_user.php',
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
                console.log("Error: ", JSON.stringify(error));
            }
        });
        request.done(function (data){
            $("#content2").load(location.href+" #content2>*","");
        });
    } else {
        iqwerty.toast.Toast("Please, fill all the details!", options);
    }
    console.log(username, admin, email);
    return false;
}