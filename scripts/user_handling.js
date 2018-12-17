/*
function promoteUser() {
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            // do something if the page loaded successfully
        }
    }
    xmlhttp.open("POST","../admin/admin_functions.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("method=promoteUser");
}*/
/*
function downgradeUser()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            // do something if the page loaded successfully
        }
    }
    xmlhttp.open("GET","admin_functions.php",true);
    xmlhttp.send();
}*/


/*
function getIdFromUrl () {
    $(".usersList a").click(function () {
            var userId = $.QueryString("id");
            alert(userId);
            return userId;
        });
}*/


function promoteToAdmin(event){
    event.preventDefault();
    var userId = $(this).attr("id").split("=").pop();
    console.log(userId);
    $.ajax({
        url: "../admin/admin_functions.php",
        type: "GET",
        data: {id: userId},
        success: function (data) {
            //var id = getIdFromUrl();
            console.log("data");
            alert("User promoted!");
        }
    });
}


function downgradeUser(event){
    event.preventDefault();
    var userId = url('id');
    console.log(userId);
    $.ajax({
        url: "../admin/admin_functions.php",
        type: "GET",
        data: {id: userId},
        success: function (data) {
            console.log("data");
            iqwerty.toast.Toast("User downgraded!");
        }
    });
}
