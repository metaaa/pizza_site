/*
$(function () {
    $('form').on('submit', function (e){
        e.preventDefault();
        $('#errorMessage').show();
        console.log('failed');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: $('form').serialize(),
            success: function () {
                $('.errorMessage').delay(3000).fadeOut('slow');
                console.log('successful!');
            }
        });
    });
});
*/
$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    //$('.errorMessage').hide();
});

//http://talkerscode.com/webtricks/ajax-login-form-using-jquery-php-and-mysql.php

function login(event){
    event.preventDefault();
    var username = $("#usernameLogin").val();
    var password = $("#passwordLogin").val();
    if(username !== "" && password !== "")
    {
        $.ajax
        ({
            type:'POST',
            url:'admin/login.php',
            //dataType:'json',
            data: {
                username: username,
                password: password
            },
            success:function(response) {
                if (response === "true"){
                    location.href="admin/index.php";
                } else {
                    console.log("Response error: ", JSON.stringify(response));
                }
            },
            error: (error) => {
                console.log("Error: ", JSON.stringify(error));
            }
        });
    }
    else {
        alert("Please Fill All The Details");
    }
    return false;
}

function register(event){
    event.preventDefault();
    var username = $("#regUsername").val();
    var password = $("#regPassword").val();
    var email = $("#regEmail").val();
    if(username !== "" && password !== "" && email !=="")
    {
        $.ajax
        ({
            type:'POST',
            url:'admin/register.php',
            data: {
                username: username,
                password: password,
                email: email
            },
            success:function(response) {
                if (response === "true"){
                    location.href="admin/index.php";
                } else {
                    console.log("Response error: ", JSON.stringify(response));
                }
            },
            error: (error) => {
                console.log("Error: ", JSON.stringify(error));
            }
        });
    }
    else {
        alert("Please Fill All The Details");
    }
    return false;
}



/*
function ajax(url, options, modal) {
    var defaults = {
        type: 'POST',
        url: url,
        data: null,
        //dataType: 'json'
    };
    var settings = $.extend({}, defaults, options);

    return new Promise(function ajaxPromise(resolve, reject) {
        var ajax = $.ajax(settings);

        ajax.done(function ajaxPromiseDone(res) {
            resolve(res);
        });

        ajax.fail(function ajaxPromiseFail(XHR, textStatus) {

            // This is needed for Chrome.
            if (XHR.status === 301 || XHR.status === 302) {
                resolve();
                return;
            }

            var error = parseError(XHR, textStatus);
            reject(error);
        });


    });
}

var $this = $('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
var options = {
    data: {
        'id': $this.data('register-form')
    }
};

ajax($this.data('href'), options)
    .then(function ajaxThen(res) {
        console.log(res);
        return res;
    })
    .catch(function ajaxCatch(error) {
        console.log(error);
        alert(error);
    })
    .then(function ajaxFinally(res) {

    });*/
