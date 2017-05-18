 <?php
require_once './bbdd2.php';        

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

function insertMusic($usu, $fpasswd, $email, $nomgrup, $web, $nummembres, $dformacio, $ciutat, $genere) {

    $con = conectar("webmusica");
    $insert = "insert into usuaris(nom_usuari,contrasenya,email,nom_grup,web,numero_components, data_formacio, id_ciutat,usuaris.id_estil) values ('$usu', '$fpasswd', '$email', '$nomgrup', '$web', $nummembres, '$dformacio', '$ciutat', '$genere')";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuari music registrat </p>";
    } else {
        echo mysqli_error($con);
    }
    desconectar($con);
}

function existeUsuario($usu){
    $conexion = conectar("webmusica");
    $consulta = "select * from usuaris where nom_usuari='$usu';";
    // Ejecutamos la consulta
    $resultado = mysqli_query($conexion, $consulta);
    // Contamos cuantas filas tiene el resultado

    $contador = mysqli_num_rows($resultado);
    desconectar($conexion);
    // Si devuelve 1 es que ya existe un usuario con ese nombre de usuario
    // Si devuelve 0 no existe
    if($contador==0){
        return false;
    }else{
        return true;
    }
}
