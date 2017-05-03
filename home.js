$(document).ready(start);

function start(){
    $("#fondo, .login").hide();
    $("#login").click(show);
}

function show(){
    $("#fondo, .login").show();
    $("#login").off();
    $(".close").click(close);
}

function close(){
    $(".close").off();
    $("#fondo, .login").hide();
    $("#login").click(show);
}
