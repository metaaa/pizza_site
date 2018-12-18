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




function promoteToAdmin(event, userId){
    event.preventDefault();
    $.ajax({
        url: "../admin/admin_functions.php",
        type: "GET",
        data: {
            id: userId,
            promote: "true"
        },
        success: function (data) {
            console.dir(data);
            iqwerty.toast.Toast("User promoted!");
        }
    });
}


function downgradeUser(event, userId){
    event.preventDefault();
    $.ajax({
        url: "../admin/admin_functions.php",
        type: "GET",
        data: {
            id: userId,
            promote: "true"
        },
        success: function (data) {
            console.dir(data);
            iqwerty.toast.Toast("User downgraded!");
        }
    });
}
