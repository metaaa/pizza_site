
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
}
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



/*function promoteUser() {
    $.ajax({
        type: "POST",
        url: "../admin/admin_functions.php",
        data: {method: 'promoteUser'},
        /!*success: function (html) {
            alert(html);
        }*!/
    });
}*/

/*function downgradeUser() {
    $.ajax({
        type: "POST",
        url: "../admin/admin_functions.php",
        data: {method: 'downgradeUser'},
        /!*success: function (html) {
            alert(html);
        }*!/
    });
}*/

/*
https://stackoverflow.com/questions/20738329/how-to-call-a-php-function-on-the-click-of-a-button

    https://stackoverflow.com/questions/19323010/execute-php-function-with-onclick



    how to trigger specific php function with jquery*/


/*
var downgradeUser = $("#downgrade").val();
$.ajax({
    url : "../admin/admin_functions.php",
    type: "POST",
    data : {text : downgradeUser} ,
    success: function(data, textStatus, jqXHR) {
        console.log(data);// You can see the result which is created in chat.php
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);// if there is an error
    }
});*/
