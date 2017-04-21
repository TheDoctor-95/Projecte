<?php

function conectar($database) {
    $con = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar con la BBDD.");
    return $con;
}

function desconectar($con) {
    mysqli_close($con);
}

/* Local */

function selectConcertsLocal($local) {
    $con = conectar("webmusica");
    $query = "select id_concert, nom, data_concert from concerts where nom_usuari = '$local'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function contaApuntats($id_concert) {
    $con = conectar("webmusica");
    $query = "select count(*) as apun from apuntar where id_concert='$id_concert'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function selectApuntats($id_concert) {
    $con = conectar("webmusica");
    $query = "select nom_usuari from usuaris where nom_usuari in (select nom_usuari from apuntar where id_concert='$id_concert')";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

/* fan */

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

function selectUsu() {
//Conectamos con la bbdd
    $con = conectar("webmusica");
//Definimos la consulta
    $query = "select * from usuaris";
//Ejecutamos la consulta, recogiendo el resultado
    $resultado = mysqli_query($con, $query);
//desconectamos de la bbdd
    desconectar($con);
//devolvemos el resultado de la consulta
    return $resultado;
}

function VotarMusicConcert() {
//Conectamos con la bbdd
    $con = conectar("webmusica");
//Definimos la consulta
    $query = "select nom_usuari, datahora from votarmusicconcert";
//Ejecutamos la consulta, recogiendo el resultado
    $resultado = mysqli_query($con, $query);
//desconectamos de la bbdd
    desconectar($con);
//devolvemos el resultado de la consulta
    return $resultado;
}

function VotarLocalConcert() {
//Conectamos con la bbdd
    $con = conectar("webmusica");
//Definimos la consulta
    $query = "select nom_usuari, datahora from votarlocalconcert";
//Ejecutamos la consulta, recogiendo el resultado
    $resultado = mysqli_query($con, $query);
//desconectamos de la bbdd
    desconectar($con);
//devolvemos el resultado de la consulta
    return $resultado;
}

function insertarVotacioConcert($votacio) {


    $con = conectar("webmusica");
    $insert = "insert into votarconcert values ('fan1', 2, '$votacio')";
    if (mysqli_query($con, $insert)) {
        echo "<p>Votació correcte</p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
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

//Registre
function insertFan($usu, $fpasswd, $fname, $fsurname, $email, $fnac, $tel, $direccio, $ciutat, $genero) {

    $con = conectar("webmusica");
    $insert = "insert into usuaris(nom_usuari,contrasenya,nom,cognoms,email,data_naixement,telefon,direccio,id_ciutat,id_estil) values ('$usu','$fpasswd','$fname','$fsurname','$email','$fnac','$tel','$direccio','$ciutat','$genero')";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuari fan registrat </p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function insertLocal($usu, $fpasswd, $email, $nomlocal, $direccio, $ciutat, $tel, $genero) {

    $con = conectar("webmusica");
    $insert = "insert into usuaris(nom_usuari,contrasenya,email,nom_local,direccio,id_ciutat,telefon,id_estil) values ('$usu', '$fpasswd', '$email', '$nomlocal', '$direccio', '$ciutat', '$tel', '$genero')";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuari local registrat </p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function insertMusic($usu, $fpasswd, $email, $nomgrup, $web, $nummembres, $ciutat, $genere) {

    $con = conectar("webmusica");
    $insert = "insert into usuaris(nom_usuari,contrasenya,email,nom_grup,web,numero_components,id_ciutat,id_estil) values ('$usu', '$fpasswd', '$email', '$nomgrup', '$web', $nummembres, '$ciutat', '$genere')";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuari music registrat </p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

//Home

function selectConcertsHome() {
    $con = conectar("webmusica");
    $query = "select concerts.nom, usuaris.nom_local, concerts.data_concert from concerts inner join usuaris on concerts.nom_usuari=usuaris.nom_usuari order by concerts.data_concert desc limit 5";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function selectMusicsHome() {
    $con = conectar("webmusica");
    $query = "select usuaris.nom_grup, estils.nom, (select count(*) from votarmusic where votacio=1)-(select count(*) from votarmusic where votacio=0) as nota from usuaris inner join estils on usuaris.id_estil=estils.id_estil inner join votarmusic on usuaris.nom_usuari=votarmusic.nom_music group by votarmusic.nom_music order by nota limit 5";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

// Registre

function selectGenere() {
    $con = conectar("webmusica");
    $query = "select * from estils";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function selectCiutats() {
    $con = conectar("webmusica");
    $query = "select * from ciutats";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
