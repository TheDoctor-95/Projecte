<?php
session_start();
require_once './bbdd2.php';
if (!isset($_SESSION["ordre1"])) {
    $_SESSION["ordre1"] = "concerts.nom desc";
}

if (isset($_POST["ordre1"])) {
    $_SESSION["ordre1"] = $_POST["ordre1"];
}


if (!isset($_SESSION["ordre2"])) {
    $_SESSION["ordre2"] = "concerts.nom desc";
}

if (isset($_POST["ordre2"])) {
    $_SESSION["ordre2"] = $_POST["ordre2"];
}
?>
<html>
    <head>
        <link href="Perfil_Local.css" rel="stylesheet" type="text/css"/>
        <link href="basic.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="perfil.js" type="text/javascript"></script>
        <title>Perfil del Music</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <a href="home.php"><div id="esquerra"><img src="Logoyem.png" /></div></a>
            <div id="mig">
                <div><img src="lletra.png" /></div>
                <nav>
                    <a href="Music.php"><div class="opcio">Music</div></a>
                    <a href=""><div class="opcio">Notificacions</div></a>
                </nav>

            </div>


            <div id="dreta">
                <div> <a href="https://www.facebook.com/"><img src="facebook.png" alt="facebook"/></a><a href="https://www.twitter.com/"><img src="twitter.png" alt="twiter" /></a><a href="https://plus.google.com/"><img src="Google.png" alt="google+" /></a></div>
                <div id="idioma_sel">
                    <div>IDIOMA <img src="flechaNegra.png"></div>
                    <div class="idiomes">
                        <p><img src="cat.jpg"> Català</p>
                        <p><img src="cas.jpg"> Castellà</p>
                        <p><img src="eng.jpg"> Angles</p>
                    </div>
                </div>
                <div><input type="text" placeHolder="buscar..."/></div>
                <div><form action='home.php' method='POST'>
                        <button name='logout'>Sortir</button>
                    </form></div>
            </div>
        </header>
        <div id="main">
            <section class="banner left">
                <img src= "musica.png" alt="musica" title="musica"/>
            </section><section id="content">
                <div class ="local" >

                    <?php
                    require_once './bbddmusic.php';
                    $user = $_SESSION["user"];

                    $datos = selectUsubyName($user);
                    echo '<form id ="formlocal" action="" method="POST" >';
                    $fila = mysqli_fetch_array($datos);
                    extract($fila);

                    echo '<div>
                            <p><input type="hidden" value="music" name="type" /></p>
                            <button type="button" id="pasreq" name="pasreq" value="pasreq">Cambiar contrasenya</button><br>
                            <div id="passchange">
                            <p>Contrasenya Actual:</p><p><input type="password" name="oldpasswd" /> </p>
                            <p>Nova Contrasenya:</p><p><input type="password"  name="fpasswd" /> </p>
                            <p>Repeteix la nova contrasenya:</p><p><input type="password" name="fpasswd2" /></p>
                            </div>
                            <p>Email*: </p><p><input type="email"  value="' . $email . '" name="email" required /> </p>
                            <p>Nom del Grup*: </p><p> <input type="text" value="' . $nom_grup . '" name="nom_grup" required /></p>
                            <p>Numero de components*: </p><p> <input type="number" value="' . $numero_components . '" name="numero_components" required /></p>
                            <p>Web del Grup: </p><p> <input type="text" value="' . $web . '" name="web"/></p>
                        </div>
                        <div>                            
                            <p>Telefon de Contacte: </p><p> <input type="tel" value="' . $telefon . '" name="tel" maxlength="9"></p>
                            <p>Data formació: </p><p> <input type="date" value="' . $data_formacio . '" name="datform"></p>   
                            <p>IMG: </p>
                            <p>Gènere musical del grup*:</p><p>    
                                <select name="genero" >';
                    $generos = selectGenere();
                    while ($fila = mysqli_fetch_array($generos)) {
                        extract($fila);
                        echo "<option value='$id_estil'>$nom</option>";
                    }
                    ?>

                    </select>
                    </p>
                </div>
                <div><input type="submit" value="Guardar Cambios" name="music" /></div>
                </form>
        </div>
        <?php
        require_once './bbddmusic.php';
        if (isset($_POST["music"])) {
            $user = $_SESSION["user"];
            $oldpassw = $_POST["oldpasswd"];
            $passw = $_POST["fpasswd"];
            $passw2 = $_POST["fpasswd2"];
            $email = $_POST["email"];
            $ngrup = $_POST["nom_grup"];
            $ncomp = $_POST["numero_components"];
            $web = $_POST["web"];
            $tel = $_POST["tel"];
            $datform = $_POST["datform"];
            $genere = $_POST["genero"];
            if ($passw != $passw2) {
                echo "Error, las dos contraseñas deben ser iguales";
            } else if ($passw == $oldpassw) {
                echo "Error, la contraseña nueva no puede ser igual que la anterior";
            } else {
                editprofil($passw, $email, $ngrup, $ncomp, $web, $tel, $datform, $genere, $user);
                echo "<p>Dades modificades</p>";
            }
        }
        ?>
    </section><section class="banner right">
        <img src= "musica.png" alt="musica" title="musica"/>
    </section>
</div>
<footer>
    <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
</footer>
</body>
</html>
