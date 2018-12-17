$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    //$('.errorMessage').hide();
});

//http://talkerscode.com/webtricks/ajax-login-form-using-jquery-php-and-mysql.php

function login(event){
    event.preventDefault();
    var username = $("#usernameLogin").val();
    var password = $("#passwordLogin").val();
    var options = {
        style: {
            main: {
                background: "pink",
                color: "black"
            }
        }
    };
    if(username !== "" && password !== ""){
        $.ajax ({
            type:'POST',
            url:'admin/login.php',
            data: {
                username: username,
                password: password
            },
            success:function(response) {
                if (response === "true"){
                    location.href="admin/index.php";
                } else if (response === "wrong_password") {
                    //console.log("Invalid password!");
                    iqwerty.toast.Toast("Invalid password!");
                } else if (response === "not_registered"){
                    //console.log("Not registered!");
                    iqwerty.toast.Toast("Not registered!");
                } else {
                    //console.log("Server error!");
                    iqwerty.toast.Toast("Server error!");
                }
            },
            error: (error) => {
                console.log("No response: ", JSON.stringify(error));
            }
        });
    } else {
        iqwerty.toast.Toast("Please, fill all the details!", options);
    }
    return false;
}

function register(event){
    event.preventDefault();
    var username = $("#regUsername").val();
    var password = $("#regPassword").val();
    var email = $("#regEmail").val();
    var options = {
        style: {
            main: {
                background: "pink",
                color: "black"
            }
        }
    };
    if(username !== "" && password !== "" && email !==""){
        $.ajax ({
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
                } else if (response === "invalid_email"){
                    //console.log("Invalid email");
                    iqwerty.toast.Toast("Invalid email!");
                } else if (response === "email_error"){
                    //console.log("Email is already registered!");
                    iqwerty.toast.Toast("Email is already registered!");
                } else if (response === "username_error"){
                    //console.log("Username is taken!");
                    iqwerty.toast.Toast("Username is taken!");
                } else {
                    //console.log("Server error: ", JSON.stringify(response));
                    iqwerty.toast.Toast("Server error!");
                }
            },
            error: (error) => {
                console.log("Error: ", JSON.stringify(error));
            }
        });
    } else {
        iqwerty.toast.Toast("Please, fill all the details!", options);
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
