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
                    <form id ="formlocal" action="" method="POST" >
                        <div>
                            <p><input type="hidden" value="local" name="type" /></p>
                            <p>Nick o nom d'usuari*:</p><p> <input type="text"  name="usu" required /> </p>
                            <p>Contrasenya*:</p><p><input type="password" name="fpasswd" /> </p>
                            <p>Repeteix la contrasenya*:</p><p><input type="password" name="fpasswd2" /></p>
                            <p>Email*: </p><p><input type="email"  name="email" required /> </p>
                            <p>Nom del Grup*: </p><p> <input type="text"  name="nom_grup" required /></p>
                            <p>Numero de components*: </p><p> <input type="text"  name="numero_components" required /></p>
                            <p>Web del Grup: </p><p> <input type="text" name="web"/></p>
                            <p> IMG:  </p>
                        </div>
                        <div>                            
                            <p>Telefon de Contacte: </p><p> <input type="tel" name="tel"></p>
                            <p>Gèneres musicals del grup*:   
                                <br />
                                <input type="checkbox" name="generes" value="pop">Pop 
                                <br />
                                <input type="checkbox" name="generes" value="rock">Rock 
                                <br />
                                <input type="checkbox" name="generes" value="jazz">Jazz  
                                <br />
                                <input type="checkbox" name="generes" value="classica">Clàssica
                                <br />
                                <input type="checkbox" name="generes" value="indie">Indie
                                <br<input type="checkbox" name="generes" value="electro">Electrònica
                            </p>
                        </div>
                        <div><input type="submit" value="Guardar Cambios" name="music" /></div>
                    </form>
                </div>
                <?php
                if(isset($_POST["music"])) {
                    $user = $_POST["usu"];
                    $passw = $_POST["fpasswd"];
                    $email = $_POST["email"];
                    $ngrup = $_POST["nom_grup"];
                    $ncomp = $_POST["numero_components"];
                    $web = $_POST["web"];
                    editprofil($passw,$email,$ngrup,$ncomp,$web,$user);
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
