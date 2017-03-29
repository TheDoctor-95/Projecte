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
    $query = "select concerts.nom as concert, usuaris.nom_local, usuaris.direccio, ciutats.nom, concerts.data_concert, apuntar.confirmacio"
            . " from concerts inner join apuntar on concerts.id_concert=apuntar.id_concert"
            . " inner join usuaris on concerts.nom_usuari=usuaris.nom_usuari"
            . " inner join ciutats on usuaris.id_ciutat=ciutats.id_ciutat"
            . " where apuntar.nom_usuari='$music' and apuntar.confirmacio=0 order by data_concert";
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

