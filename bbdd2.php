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

/*fan */

function ProximsConcerts() {
    //Conectamos con la bbdd
    $con = conectar("webmusica");
    //Definimos la consulta
    $query ="select nom,data_concert from concerts order by data_concert desc";
    //Ejecutamos la consulta, recogiendo el resultado
    $resultado =mysqli_query($con,$query);
    //desconectamos de la bbdd
    desconectar ($con);
    //devolvemos el resultado de la consulta
    return $resultado;
    
}

function VotarMusicConcert() {
    //Conectamos con la bbdd
    $con = conectar("webmusica");
    //Definimos la consulta
    $query ="select nom_usuari, datahora from votarmusicconcert";
    //Ejecutamos la consulta, recogiendo el resultado
    $resultado =mysqli_query($con,$query);
    //desconectamos de la bbdd
    desconectar ($con);
    //devolvemos el resultado de la consulta
    return $resultado;
    
}

