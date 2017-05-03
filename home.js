$(document).ready(start);

function start(){
    $("#fondo, .login").hide();
    $("#login").click(show);
    $(".publi").slick({autoplay: true,
  autoplaySpeed: 2000});
}

function show(){
    $("#fondo, .login").show();
    $("#login").off();
    $(".close, #fondo").click(close);
}

function close(){
    $(".close").off();
    $("#fondo, .login").hide();
    $("#login").click(show);
}
