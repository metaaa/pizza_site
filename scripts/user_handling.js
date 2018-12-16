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



function getIdFromUrl () {
    $(".usersList a").click(function () {
            var userId = $.QueryString("id");
            alert(userId);
            return userId;
        });
}


function promoteUser(){
    $.ajax({
        url: "/pizza_site/admin/admin_functions.php",
        type: "POST",
        data: {promote: "yes"},
        success: function (data) {
            //var id = getIdFromUrl();
            console.log("data");
            alert("User promoted!");
        }
    });
}


function downgradeUser(){
    $.ajax({
        url: "/pizza_site/admin/admin_functions.php",
        type: "POST",
        data: {downgrade: "yes"},
        success: function (data) {
            getIdFromUrl();
            console.log("data");
            alert("User downgraded!");

        }
    });
}
