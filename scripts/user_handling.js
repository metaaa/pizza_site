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

/*$urlPromotable = function(name){
    var result = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return result[1] || 0;
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


// possible solution: https://stackoverflow.com/questions/31665575/sql-query-without-refresh

//OR   https://stackoverflow.com/questions/42453785/update-the-value-of-select-box-with-php-mysql-jquery-ajax