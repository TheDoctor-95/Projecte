<?php

function conectar($database) {
    $con = mysqli_connect("localhost", "root", "", "webmusica")
            or die("No se ha podido conctar con la BBDD.");

    return $con;
}

function desconectar($conexion) {
    mysqli_close($conexion);
}

function ProximsConcerts() {
    //Conectamos con la bbdd
    $con = conectar("webmusica");
    //Definimos la consulta
    $query = "select nom,data_concert from concerts order by data_concert desc";
    //Ejecutamos la consulta, recogiendo el resultado
    $resultado = mysqli_query($con, $query);
    //desconectamos de la bbdd
    desconectar($con);
    //devolvemos el resultado de la consulta
    return $resultado;
}

function VotarConcert() {
    //Conectamos con la bbdd
    $con = conectar("webmusica");
    //Definimos la consulta
    $query = "select nom_usuari,nom, data_concert, id_concert from concerts ;";

    //Ejecutamos la consulta, recogiendo el resultado
    $resultado = mysqli_query($con, $query);
    //desconectamos de la bbdd
    desconectar($con);
    //devolvemos el resultado de la consulta
    return $resultado;
}

function VotarMusic() {
    //Conectamos con la bbdd
    $con = conectar("webmusica");
    //Definimos la consulta
    $query = "select nom_usuari from usuaris where classe_usuari='Music'";
    //Ejecutamos la consulta, recogiendo el resultado
    $resultado = mysqli_query($con, $query);
    //desconectamos de la bbdd
    desconectar($con);
    //devolvemos el resultado de la consulta
    return $resultado;
}

function insertarVotacioMusic($nom_usuari, $votacio) {


    $con = conectar("webmusica");
    $insert = "update user set votacio=(votacio+$votacio) where nom_usuari='$nom_usuari'";

    if (mysqli_query($con, $insert)) {
        echo "<p>Votació correcte</p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function insertarVotacioConcert($id_concert, $votacio) {

    $con = conectar("webmusica");
    $insert = "update user set votacio=(votacio+$votacio) where id_concert='$id_concert'";

    if (mysqli_query($con, $insert)) {
        echo "<p>Votació correcte</p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}
