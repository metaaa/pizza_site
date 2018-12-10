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

$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('.errorMessage').hide();
});



/*function do_login()
{
    var email=$("#emailid").val();
    var pass=$("#password").val();
    if(email!="" && pass!="")
    {
        $("#loading_spinner").css({"display":"block"});
        $.ajax
        ({
            type:'post',
            url:'do_login.php',
            data:{
                do_login:"do_login",
                email:email,
                password:pass
            },
            success:function(response) {
                if(response=="success")
                {
                    window.location.href="index.php";
                }
                else
                {
                    $("#loading_spinner").css({"display":"none"});
                    alert("Wrong Details");
                }
            }
        });
    }

    else
    {
        alert("Please Fill All The Details");
    }

    return false;
}*/


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
