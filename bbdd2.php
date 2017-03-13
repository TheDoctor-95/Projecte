<?php
function conectar($database) {
    $con = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar con la BBDD.");
    return $con;
}

function desconectar($con) {
    mysqli_close($con);
}

function selectConcertsLocal($local){
    $con = conectar("webmusica");
    $query = "select id_concert, nom, data_concert from concerts where nom_usuari = '$local'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function contaApuntats($id_concert){
    $con = conectar("webmusica");
    $query = "select count(*) as apun from apuntar where id_concert='$id_concert'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function selectApuntats($id_concert){
    $con = conectar("webmusica");
    $query = "select nom_grup from apuntar inner join usuaris on usuaris.nom_usuari=apuntar.nom_usuari where id_concert=$id_concert";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}