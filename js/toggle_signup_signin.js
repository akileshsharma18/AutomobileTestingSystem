$(document).ready(function(){  
    $("#button1").click(function(){
        $('#show_login_button').fadeOut(400);  
        $("#show_signup_button").fadeIn(400);
    });
            
    $("#button2").click(function(){
        $('#show_login_button').fadeIn(400);
        $('#show_signup_button').fadeOut(400);                 
    });
            
}); 