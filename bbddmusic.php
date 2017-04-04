<?php
function conectar($database) {
    $con = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar con la BBDD.");
    return $con;
}

function desconectar($conexión) {
    mysqli_close($conexión);
}

function selectConcertsUnconfirm($music) {
    $con = conectar("webmusica");
    $query = "select concerts.nom as concert, usuaris.nom_local, usuaris.direccio, ciutats.nom, concerts.data_concert, concerts.id_concert"
            . " from concerts inner join usuaris on concerts.nom_usuari=usuaris.nom_usuari"
            . " inner join ciutats on usuaris.id_ciutat=ciutats.id_ciutat"
            . " where id_concert not in (select id_concert from apuntar where apuntar.nom_usuari='$music'and confirmacio=1 )"
            . " order by data_concert";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectConcertsConfirm($music) {
    $con = conectar("webmusica");
    $query = "select concerts.nom as concert, usuaris.nom_local, usuaris.direccio, ciutats.nom, concerts.data_concert"
            . " from concerts inner join apuntar on concerts.id_concert=apuntar.id_concert"
            . " inner join usuaris on concerts.nom_usuari=usuaris.nom_usuari"
            . " inner join ciutats on usuaris.id_ciutat=ciutats.id_ciutat"
            . " where apuntar.nom_usuari='$music' and apuntar.confirmacio=1 order by data_concert";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function checkapuntar($music,$id_concert){
    $con=conectar("webmusica");
    $query="select * from apuntar where nom_usuari='$music' and id_concert=$id_concert";
    $resultado = mysqli_query($con, $query);
    $contador=mysqli_num_rows($resultado);
    desconectar($con);
    if($contador==0){
        return false;
    }else{ //Este else no hace falta
        return true;
    }
}

function switchapuntar ($nusuario,$id_concert){
    $con=conectar("webmusica");
    $insert="insert into apuntar values"."('$nusuario','$id_concert',0)";
    if(mysqli_query($con,$insert)){
    }else{
        echo mysqli_error($conexion);
    }
    desconectar($con);
}

function deleteapuntar ($nusuario,$id_concert){
    $con=conectar("webmusica");
    $delete="detele from apuntar  where id_concert ='$id_concert' and nom_usuari='$nusuario'";
    if(mysqli_query($con,$delete)){
    }else{
        echo mysqli_error($con);
    }
    desconectar($con);
}
