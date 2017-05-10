$(document).ready(start);

function start(){
    $(".preguntes>div").hide();
    $("#botons>button").click(show);
    
      $("#notifications").animate({top : 0},{duration:2000,complete:disapear});
}

function show(){
    var div = $(this).attr("id");
    $("#botons>button").css({"text-decoration": "none"});
    $(this).css({"text-decoration": "underline overline"});
    $("#botons").animate({"margin-top":"10px"},{duration:1000});
    $(".preguntes>div").hide();
    $("."+div).show();
    $("#formfan").validate();
    $("#formlocal").validate();
    $("#formmusic").validate();
}

function disapear(){
    
    console.log("hola");
    $("#notifications").empty();
}