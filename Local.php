<!DOCTYPE html>

<html>
    <head>

        <title>LOCAL</title>
        <link href="Local.css" rel="stylesheet" type="text/css" />
        <link href="basic.css" rel="stylesheet" type="text/css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="jquery.validate.js" type="text/javascript"></script>
        <script src="local.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
        } else {
            header("Location:home.php");
        }

        require_once './bbdd2.php';
        if (!isset($_SESSION["ordre"])) {
            $_SESSION["ordre"] = "nom desc";
        }

        if (isset($_POST["ordre"])) {
            $_SESSION["ordre"] = $_POST["ordre"];
        }
        ?>
        <div id="notifications">
            <?php
            if (isset($_POST["add"])) {
                echo "<p>Notificacio de prova</p>";
            }
            if (isset($_POST["conf"])) {
                updateMusicConcert($_POST["conconf"], $_POST["conf"]);
            }
            ?>
        </div>
        <header>
            <a href="home.php"><div id="esquerra"><img src="Logoyem.png" /></div></a>
            <div id="mig">
                <div><img src="lletra.png" /></div>
                <nav>
                    <a href="Perfil_Local.php"><div class="opcio">Perfil</div></a>
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
                <div>
                    <form action='home.php' method='POST'>
                        <button name='logout'>Sortir</button>
                    </form>
                </div>
            </div>
        </header>
        <div id="main">
            <section class="banner left">
                <img src= "musica.png" alt="musica" title="musica"/>
            </section><section id="content">

                <header>
                    <div>Afegir Concert
                        <div id="desplegable">
                            <form action="" method="POST">
                                <p>Nom </p><p><input type="text" name="name_concierto" /></p>
                                <p>Data concierto </p><p><input type="datetime" name="data_concierto" /></p>
                                <p>Preu </p><p> <input type="number" name="price" /></p>
                                <p>GENERO </p><p>
                                    <select name="genero">
                                        <?php
                                        $generos = selectGenere();
                                        while ($fila = mysqli_fetch_array($generos)) {
                                            extract($fila);
                                            echo "<option value='$id_estil'>$nom</option>";
                                        }
                                        ?>
                                    </select></p>
                                <p>Aforament Maxim </p><p> <input type="number" name="aforo" /></p>
                                <p><input type="submit" value="Añadir" name="add" /></p>
                            </form>
                        </div>
                    </div>

                </header>
                <div id="table">
                    <table>
                        <tr id="toptable">
                            <td><form action="" method="POST" >Concert<button name="ordre" value="nom desc" ><img src="flechaNegra.png" /></button></form></td>
                            <td><form action="" method="POST" >Data i Hora<button name="ordre" value="data_concert asc" ><img src="flechaNegra.png" /></button></form></td>
                            <td>Estat</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                        $concerts = selectConcertsLocal($user, $_SESSION["ordre"]);
                        while ($concert = mysqli_fetch_array($concerts)) {
                            extract($concert);
                            echo"<tr >
                                    <td>$nom</td>
                                    <td>$data_concert</td>
                                    <td>";
                            if (selectConcertState($id_concert)) {
                                $music=  mysqli_fetch_array(selectMusicConcert($id_concert));
                                extract($music);
                                echo "$nom_usuari";
                            } else {
                                $apuntats = mysqli_fetch_array(contaApuntats($id_concert));
                                extract($apuntats);
                                echo "$apun Musics Apuntas";
                                if ($apun != 0) {
                                    echo "<div>";
                                    $nom_apuntats = selectApuntats($id_concert);
                                    while ($nom_apuntat = mysqli_fetch_array($nom_apuntats)) {
                                        extract($nom_apuntat);
                                        echo "<p><form action='' method='POST' ><input type='hidden' name='conconf' value='$id_concert' /> $nom_usuari <button name='conf' value='$nom_usuari'><img src='flechaNegra.png' /></button></form></p>";
                                    }
                                    echo "</div>";
                                }
                            }
                            echo "</td><td>Modificar</td>
                                            <td>x</td>
                                        </tr>";
                        }
                        ?>

                    </table>
                </div>
            </section><section class="banner right">
                <img src= "musica.png" alt="musica" title="musica" />
            </section>
        </div>
        <footer>
            <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
        <div id='fondo'></div>

    </body>
</html>
