/**
 * Created by AnushkaM on ११-०७-२०१७.
 */
$(document).ready(function(){
    $("#id").on("keyup",function(){
        var email = $(this).val();
        //alert('here');
        $.ajax({

            url: '../Innerve-Signup/_/includes/idCheck.php',
            type: 'POST',
            cache: false,
            data : { id : email},
            success : function(response){
                $("#exists").html(response);
                $("#exists").css("color","red");
            }
        });
    });
});