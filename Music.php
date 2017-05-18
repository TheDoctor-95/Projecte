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
        <title>Music</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">                
        <link href="Music.css" rel="stylesheet" type="text/css"/>
        <link href="basic.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <div id="esquerra">
                <a href="home.php"><img src= "logoyem.png" alt="logoyem" title="Homepage"/></a>
            </div><div id="mig">
                <div><img src="lletra.png" alt="titul" /></div>
                <nav>
                    <a href="Perfil_Music.php"><div class="opcio">Perfil</div></a>
                    <a href="music.php"><div class="opcio">Notificacions/Avisos</div></a>
                </nav>
            </div>
            <div id="dreta">
                <div> <a href="https://www.facebook.com/"><img src="facebook.png" alt="facebook"/></a><a href="https://www.twitter.com/"><img src="twitter.png" alt="twiter" /></a><a href="https://plus.google.com/"><img src="Google.png" alt="google+" /></a></div>
                <div id="idioma_sel">
                    <div>IDIOMA <img src="flechaNegra.png"></div>
                    <div class="idiomes">
                        <p><img src="cat.jpg"> Català</p>
                        <p><img src="cas.jpg"> Castellà</p>
                        <p><img src="eng.jpg"> Anglès</p>
                    </div>
                </div>
                <div>search</div>
                <div>
                    <form action='home.php' method='POST'>
                        <button name='logout'>Sortir</button>
                    </form>
                </div>
            </div>
        </header>
        <div id="main">
            <section class="banner left">
                <img src= "musica.png" alt="musica" title="musica" width="10" height="500"/>
            </section><section id="content">
                <?php
                require_once 'bbddmusic.php';
                if (isset($_POST["alta"])) {
                    switchapuntar("music5", $_POST["concert"]);
                }
                if (isset($_POST["baixa"])) {
                    deleteapuntar("music5", $_POST["concert"]);
                }
                ?>
                <div class="mdiv">
                    <header id="ttaula">Proximes actuacions acordades previstes

                    </header> 
                    <div class="taula">
                        <table>
                            <tr id="toptable" class="center">
                                <td><form action="" method="POST">Concert<button name="ordre" value="concerts.nom desc"><img src="flechaNegra2.png"/></button></form></td>
                                <td><form action="" method="POST">Local<button name="ordre" value="nom_local"><img src="flechaNegra2.png"/></button></form></td>
                                <td><form action="" method="POST">Direcció local<button name="ordre" value="direccio"><img src="flechaNegra2.png"/></button></form></td>
                                <td><form action="" method="POST">Població<button name="ordre" value="nom"><img src="flechaNegra2.png"/></button></form></td>
                                <td><form action="" method="POST">Data/Hora<button name="ordre" value="data_concert"><img src="flechaNegra2.png"/></button></form></td>
                            </tr>
                            <?php
                            $musica = selectConcertsConfirm("music5", $_SESSION["ordre1"]);

                            while ($fila = mysqli_fetch_array($musica)) {
                                extract($fila);
                                echo "<tr>";

                                echo "<td>$concert</td>";
                                echo "<td>$nom_local</td>";
                                echo "<td>$direccio</td>";
                                echo "<td>$nom</td>";
                                echo "<td>$data_concert</td>";


                                echo "</tr>";
                            }
                            ?>
                        </table>

                    </div>
                    <div class="mdiv2">
                        <div class="blog">Concerts pendents d'assignació<br>
                            <div class="taula">
                                <table>
                                    <tr id="toptable">
                                        <td><form action="" method="POST">Concert<button name="ordre2" value="concerts.nom"><img src="flechaNegra2.png"/></button></form></td>
                                        <td><form action="" method="POST">Local<button name="ordre2" value="nom_local"><img src="flechaNegra2.png"/></button></form></td>
                                        <td><form action="" method="POST">Direcció local<button name="ordre2" value="direccio"><img src="flechaNegra2.png"/></button></form></td>
                                        <td><form action="" method="POST">Població<button name="ordre2" value="nom"><img src="flechaNegra2.png"/></button></form></td>
                                        <td><form action="" method="POST">Data/Hora<button name="ordre2" value="data_concert"><img src="flechaNegra2.png"/></button></form></td>
                                        <td>Estat</td>
                                    </tr>
                                    <?php
                                    $musica = selectConcertsUnconfirm("music5", $_SESSION["ordre2"]);

                                    while ($fila = mysqli_fetch_array($musica)) {
                                        extract($fila);
                                        echo "<tr>";

                                        echo "<td>$concert</td>";
                                        echo "<td>$nom_local</td>";
                                        echo "<td>$direccio</td>";
                                        echo "<td>$nom</td>";
                                        echo "<td>$data_concert</td>";
                                        echo "<td>";
                                        if (checkapuntar("music5", $id_concert)) {
                                            echo "<form action='' method='POST'><input type='hidden' value='$id_concert' name='concert'/><button name='alta' value='alta' id='green'>Alta</button></form>";
                                        } else {
                                            echo "<form action='' method='POST'><input type='hidden' value='$id_concert' name='concert'/><button name='baixa' value='baixa' id='red'>Baixa</button></form>";
                                        }
                                        echo"</td>";

                                        echo "</tr>";
                                    }
                                    ?>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </section><section class="banner right">
                <img src= "musica.png" alt="musica" title="musica" width="10" height="500"/>
            </section>
        </div>
        <footer>
            <span>Your Easy Music</span> <a href='Quisom.php'>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>
