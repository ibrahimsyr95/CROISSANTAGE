
$(document).ready(function() {
$("#btnsub").click(function() {
    
    $.ajax({
        url: "./verify",
        method: "post",
        data: {"csrf_token":$("#csrf_token").val(),
            "donnees": {
                login: $("#login").val(),
                pwd: $("#pwd").val()
            }

        },
        success: function(result) {
            switch (result) {
                case 'true':
                   
                     location.replace("./");
                    break;
                default:
                    $("#form").prepend('<div class="alert alert-danger "><strong>Danger!</strong> Indicates a dangerous or potentially negative action.</div>');
                    setTimeout(function() {
                        $(".alert").hide(1000);
                    }, "3000");
                    // code block
            }
        }
    });
});

$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });



        $("#btnsubcreatecount").click(function () {
      alert($("#pssd1").val());
            const donnees = {
                firstname: $("#firstname").val()
                , lastname: $("#lastname").val()
                , alias: $("#alias").val()
                , pwd: $("#pssd1").val()
                , login: $("#login_register").val()
                , defaultPastry: $("#selectviennoiserie").val()
            };
            $.ajax({
                url: "./signin"
                , method: "post"
                , data: {donnees,
                    "csrf_token": $("#csrf_token").val()}
                ,
                success: function (result) {
                    switch (result) {
                        case '1':
                        $("#signinform").prepend('<div class="alert alert-success "> <strong>Success!</strong> Indicates a successful or positive action.</div>');

                                 break;
                        default:
                        $("#signinform").prepend('<div class="alert alert-danger "><strong>Danger!</strong> Indicates a dangerous or potentially negative action.</div>');

                        // code block
                    }

                }
            });
        });
 

});