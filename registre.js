$(document).ready(start);

function start(){
    $(".preguntes>div").hide();
    $("#botons>button").click(show);
}

function show(){
    var div = $(this).attr("id");
    $("#botons>button").css({"text-decoration": "none"});
    $(this).css({"text-decoration": "underline overline"});
    $("#botons").animate({"margin-top":"10px"},{duration:1000});
    $(".preguntes>div").fadeOut();
    $("."+div).fadeIn();
    $("#formfan").validate();
    $("#formlocal").validate();
    $("#formmusic").validate();
}