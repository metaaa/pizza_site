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
