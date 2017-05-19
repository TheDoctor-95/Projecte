<?php

require_once './bbdd2.php';

function selectConcertsUnconfirm($music, $ordre) {
    $con = conectar("webmusica");
    $query = "select concerts.nom as concert, usuaris.nom_local, usuaris.direccio, ciutats.nom, concerts.data_concert, concerts.id_concert "
            . " from concerts inner join usuaris on concerts.nom_usuari=usuaris.nom_usuari"
            . " inner join ciutats on usuaris.id_ciutat=ciutats.id_ciutat"
            . " where id_concert not in (select id_concert from apuntar where apuntar.nom_usuari='$music'and confirmacio=1 )"
            . " order by $ordre";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function selectConcertsConfirm($music, $ordre) {
    $con = conectar("webmusica");
    $query = "select concerts.nom as concert, usuaris.nom_local, usuaris.direccio, ciutats.nom, concerts.data_concert "
            . " from concerts inner join apuntar on concerts.id_concert=apuntar.id_concert"
            . " inner join usuaris on concerts.nom_usuari=usuaris.nom_usuari"
            . " inner join ciutats on usuaris.id_ciutat=ciutats.id_ciutat"
            . " where apuntar.nom_usuari='$music' and apuntar.confirmacio=1 order by $ordre";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function checkapuntar($music, $id_concert) {
    $con = conectar("webmusica");
    $query = "select * from apuntar where nom_usuari='$music' and id_concert=$id_concert";
    $resultado = mysqli_query($con, $query);
    $contador = mysqli_num_rows($resultado);
    desconectar($con);
    if ($contador == 0) {
        return true;
    } else { //Este else no hace falta
        return FALSE;
    }
}

function switchapuntar($nusuario, $id_concert) {
    $con = conectar("webmusica");
    $insert = "insert into apuntar values" . "('$nusuario','$id_concert',0)";
    if (mysqli_query($con, $insert)) {
        
    } else {
        echo mysqli_error($conexion);
    }
    desconectar($con);
}

function deleteapuntar($nusuario, $id_concert) {
    $con = conectar("webmusica");
    $delete = "delete from apuntar where id_concert ='$id_concert' and nom_usuari='$nusuario'";
    if (mysqli_query($con, $delete)) {
        
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}
function selectUsubyNameM($name) {
    $con = conectar("webmusica");
    $query = "select * from usuaris where usuaris.nom_usuari='$name'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function editprofilm($passw, $email, $ngrup, $ncomp, $web, $tel, $datform, $genere, $user) {
    $con = conectar("webmusica");
    $update = "update usuaris set contrasenya='$passw', email='$email', nom_grup='$ngrup', numero_components='$ncomp', web='$web', telefon='$tel', data_formacio='$datform' ,id_estil='$genere' where nom_usuari='$user'";
    if (mysqli_query($con, $update)) {
        
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function selectUsubyNameL($name) {
    $con = conectar("webmusica");
    $query = "select * from usuaris inner join concerts on usuaris.nom_usuari=concerts.nom_usuari inner join ciutats on usuaris.id_ciutat=ciutats.id_ciutat where usuaris.nom_usuari='$name'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function editprofill1($passw, $email, $nlocal, $ciutat, $web, $direccio, $tel, $datinau, $genere, $user) {
    $con = conectar("webmusica");
    $update = "update usuaris set usuaris.contrasenya='$passw', usuaris.email='$email', usuaris.nom_local='$nlocal', usuaris.id_ciutat='$ciutat', usuaris.web='$web', usuaris.direccio='$direccio', usuaris.telefon='$tel', usuaris.data_inauguracio='$datinau' ,usuaris.id_estil='$genere' where usuaris.nom_usuari='$user'";
    if (mysqli_query($con, $update)) {
        
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}
function editprofill2($aforo, $user) {
    $con = conectar("webmusica");
    $update = "update concerts set aforament_max='$aforo' where nom_usuari='$user'";
    if (mysqli_query($con, $update)) {
        
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function verificarUser2($username, $pass) {
    $con = conectar("webmusica");
    $query = "select contrasenya from usuaris where username='$username'";
    $resultado = mysqli_query($con, $query);
    $filas = mysqli_num_rows($resultado);
    desconectar($con);
    if ($filas > 0) {
        $fila = mysqli_fetch_array($resultado);
        extract($fila);
        return password_verify($pass, $password);
    } else {    
        return false;
    }
}

function updatePassword2($username, $pass) {
    $con = conectar("webmusica");
    $update = "update usuaris set contrasenya='$pass' where username='$username'";
    if (mysqli_query($con, $update)) {
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}