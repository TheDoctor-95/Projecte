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

function selectConcertsLocal($local, $ordre) {
    $con = conectar("webmusica");
    $query = "select id_concert, nom, data_concert from concerts where nom_usuari = '$local' order by $ordre";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function selectConcertState($id_concert) {
    $con = conectar("webmusica");
    $query = "select count(*)as count from apuntar where id_concert='$id_concert' and confirmacio=1";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    $result = mysqli_fetch_array($resultado);
    extract($result);
    if ($count == 1) {
        return true;
    } else {
        return false;
    }
}

function selectMusicConfirmat($id_concert) {
    $con = conectar("webmusica");
    $$query = "select nom_usuari from usuaris where nom_usuari in (select nom_usuari from apuntar where id_concert='$id_concert' and confirmacio=1)";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    $result = mysqli_fetch_array($resultado);
    extract($result);
    if ($count == 1) {
        return true;
    } else {
        return false;
    }
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

function updateMusicConcert($id_concert, $nom_usuari) {
    $con = conectar("webmusica");
    $query = "UPDATE apuntar SET confirmacio=1 WHERE nom_usuari='$nom_usuari' and id_concert='$id_concert'";
    if (mysqli_query($con, $query)) {
        echo "<p>$nom_usuari acceptat per el concert</p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function selectMusicConcert($id_concert) {

    $con = conectar("webmusica");
    $query = "select nom_usuari from apuntar where id_concert='$id_concert'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

/* fan */
function selectDadesUsu($username) {
    $con = conectar("webmusica");
    $query = "select * from usuaris where nom_usuari='$username'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
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
    $query = "select * from usuaris where classe_usuari='Music'";
    //Ejecutamos la consulta, recogiendo el resultado
    $resultado = mysqli_query($con, $query);
    //desconectamos de la bbdd
    desconectar($con);
    //devolvemos el resultado de la consulta
    return $resultado;
}

function insertarVotacioMusic($username, $nom_music) {


    $con = conectar("webmusica");
    $insert = "insert into votarmusic values('$username','$nom_music',1)";

    if (mysqli_query($con, $insert)) {
     
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function insertarVotacioConcert($username, $id_concert) {

    $con = conectar("webmusica");
    $insert = "insert into votarconcert values" . "('$username', '$id_concert',1)";

    if (mysqli_query($con, $insert)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function eliminarVotacioConcert($username, $id_concert) {

    $con = conectar("webmusica");

    $insert = "delete from votarconcert where nom_usuari='$username' and id_concert='$id_concert' ";
  
    if (mysqli_query($con, $insert)) {
       
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function eliminarVotacioMusic($username, $nom_music) {

    $con = conectar("webmusica");

    $insert = "delete from votarmusic where nom_usuari='$username' and nom_music='$nom_music' ";
   
    if (mysqli_query($con, $insert)) {
       
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function checkvotacioconcert($nom_usuari, $id_concert) {
    $conexion = conectar("webmusica");
    $consulta = "select * from votarconcert where nom_usuari='$nom_usuari' and id_concert='$id_concert'";
    
    $resultado = mysqli_query($conexion, $consulta);
    $contador = mysqli_num_rows($resultado);
    desconectar($conexion);
    if ($contador == 0) {
        return false;
    } else {
        return true;
    }
}

function checkvotaciomusic($nom_usuari, $nom_music) {
    $conexion = conectar("webmusica");
    $consulta = "select * from votarmusic where nom_usuari='$nom_usuari' and nom_music='$nom_music'";
    $resultado = mysqli_query($conexion, $consulta);
    $contador = mysqli_num_rows($resultado);
    desconectar($conexion);
    if ($contador == 0) {
        return false;
    } else {
        return true;
    }
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
    $query = "select usuaris.nom_grup, estils.nom, sum(votacio)*10/count(*) as nota from usuaris inner join estils on usuaris.id_estil=estils.id_estil inner join votarmusic on usuaris.nom_usuari=votarmusic.nom_music group by votarmusic.nom_music order by nota desc limit 5";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function verificarUser($user, $pass) {
    $con = conectar("webmusica");
    $query = "select contrasenya from usuaris where nom_usuari='$user'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    
    desconectar($con);
    if ($filas > 0) {
        // Comprobamos que la contraseña es correcta
        $fila = mysqli_fetch_array($resultado);
        extract($fila);
        
//        if (password_verify($pass, $password)) {
//            return true;
//        } else {
//            return false;
//        }
        return true;
        //return password_verify($pass, $contrasenya);
    } else {    // Este else no hace falta
        return false;
    }
}

function getUserType($user) {
    $con = conectar("webmusica");
    $query = "select classe_usuari from usuaris where nom_usuari='$user'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    $resultado = mysqli_fetch_array($resultado);
    extract($resultado);
    return $classe_usuari;
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
