$(document).ready(function () {
    $('.check_email').keyup(function (e) {
        
        var email = $('.check_email').val();
        //alert(email);
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                "check_submit_btn": 1,
                "email_id": email,
            },
            //dataType: "dataType",
            success: function (response) {
                //alert(response);
                $('.error_email').text(response);
            }
        });

    });
});



$(document).ready(function () {
    $('.check_playeremail').keyup(function (e) {
        
        var email = $('.check_playeremail').val();
        //alert(email);
        $.ajax({
            type: "POST",
            url: "player_reg.php",
            data: {
                "check_submit_btn": 1,
                "email_id": email,
            },
            //dataType: "dataType",
            success: function (response) {
                //alert(response);
                $('.error_playeremail').text(response);
            }
        });

    });
});