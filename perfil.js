$(document).ready(ini);

function ini() {
    $("#passchange").hide();
    
    $("#pasreq").click(pass);
    function pass(){
        $("#passchange").fadeToggle();
    }
    
}

