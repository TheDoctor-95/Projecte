$(document).ready(start);

function start(){
    $("#desplegable, #fondo").hide();
    $("#content>header>div").click(show);
    $("#notifications").animate({top : 0},{duration:2000,complete:disapear});
}
function show(){
    $("#desplegable, #fondo").show();
    $("#fondo").click(hide);
    
}

function hide(){
    $("#desplegable, #fondo").hide();
    $("#content>header>div").click(show);
    
}

function disapear(){
    
    console.log("hola");
    $("#notifications").empty();
}