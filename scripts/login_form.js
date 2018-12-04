/*
$(document).ready(function(){
    $('form').on('submit', function(e){
        console.log('is it working?')
        if (!valid) {
            e.preventDefault();
            e.stopPropagation();
            alert('asd');
        }
    })
})
*/

$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});


/*
function SubmitRegData(){
    var username = $("regUsername").val();
    var email = $("regEmail").val();
    var password = $("regPassword").val();
    $.post("../admin/admin_functions.php", {regUsername: username, regEmail: email, regPassword: password},
        function(){
        console.log(username);
        $('register-form')[0].reset();
        });
}
*/

//addprevent default



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
