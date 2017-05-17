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
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <a href="home.php"><div id="esquerra"><img src="Logoyem.png" /></div></a>
            <div id="mig">
                <div><img src="lletra.png" /></div>
                <nav>
                    <a href="Local.php"><div class="opcio">Local</div></a>
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
                    <form id ="formlocal" action="" method="POST" >
                        <div>
                            <p><input type="hidden" value="local" name="type" /></p>
                            <p>Contrasenya*:</p><p><input type="password" name="fpasswd" /> </p>
                            <p>Repeteix la contrasenya*:</p><p><input type="password" name="fpasswd2" /></p>
                            <p>Email*: </p><p><input type="email"  name="email" required /> </p>
                            <p>Nom del local*: </p><p> <input type="text"  name="nomlocal" required /></p>
                            <p>Ciutat*: </p><p> <input type="text" name="ciutat" required /></p> 
                            <p>Web del local: </p><p> <input type="text" name="web"/></p> 
                            <p> IMG:  </p>
                        </div>
                        <div>
                            <p>Direcció*: </p><p><input type="text" name="direccio" /></p>                             
                            <p>Telèfon*: </p><p> <input type="tel" name="tel"></p>
                            <p>Gènere que es toca al local*:</p>   
                            <p><select name="genero" >
                                    <?php
                                    $generos = selectGenere();
                                    while ($fila = mysqli_fetch_array($generos)) {
                                        extract($fila);
                                        echo "<option value='$id_estil'>$nom</option>";
                                    }
                                    ?>
                                </select>
                            </p>
                            <p>Aforo: </p><p> <input type="number" name="aforo"></p>
                        </div>
                        <div><input type="submit" value="Guardar Cambios" name="local" /></div>
                    </form>
                </div>
                <?php
                require_once './bbddmusic.php';
                if (isset($_POST["music"])) {
                    $user = $_SESSION["user"];
                    $passw = $_POST["fpasswd"];
                    $email = $_POST["email"];
                    $nlocal = $_POST["nomlocal"];
                    $ciutat = $_POST["ciutat"];
                    $web = $_POST["web"];
                    $direccio = $_POST["direccio"];
                    $tel = $_POST["tel"];
                    $genere = $_POST["genero"];
                    $aforo = $_POST["aforo"];
                    editprofil($passw, $email, $nlocal, $ciutat, $web, $direccio, $tel, $genere, $aforo, $user);
                    echo "<p>Dades modificades</p>";
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
