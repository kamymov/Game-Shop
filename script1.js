$(document).ready(function () {

            // login
    $("#a_login").click(function(){
        $("#div_login").show();
    })
    $("#multipart_login").click(function(){
        $("#div_login").hide();
    })

                // register
    $("#a_Register").click(function(){
        $("#div_register").show();
    })
    $("#multipart_register").click(function(){
        $(".div_login").hide();
    })
            // menu 
    $("#i_menu_click").click(function(){
        $(".div_menu_responsive").show(1000);
    })
    $("#arrow_right").click(function(){
        $(".div_menu_responsive").hide(1000);
    })

            //sabad kharid

    $("#a_sabad_kharid").click(function(){
        $(".div_sabad_kharid_koli").show();
        $(".div_body_1").hide();
    })
    $("#multipart_sabad").click(function(){
        $(".div_sabad_kharid_koli").hide();
        $(".div_body_1").show();
    })

            // search
    $("#search_icon").click(function(){
        $(".div_search_responsive").show();
    })
    $("#Multipart_Search").click(function(){
        $(".div_search_responsive").hide();
    })

            // mahsolat

    $("#span_info_mahsolat_inf").click(function(){
        $(".div_info").show();
        $(".div_moshakhasat_koli").hide();
        $("#span_info_mahsolat_mosh").css({"color" : "black" , "border-bottom" : "none"});
        $("#span_info_mahsolat_inf").css({"color" : "green","border-bottom" : "2px solid green"});
    })

    $("#span_info_mahsolat_mosh").click(function(){
        $(".div_info").hide();
        $(".div_moshakhasat_koli").show();
        $("#span_info_mahsolat_inf").css({"color" : "black" , "border-bottom" : "none"});
        $("#span_info_mahsolat_mosh").css({"color" : "green","border-bottom" : "2px solid green"});
    })
});