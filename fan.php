<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="fan.css" rel="stylesheet" type="text/css"/>
        <link href="basic.css" rel="stylesheet" type="text/css"/>


    </head>
    <body>

        <header>
            <a href="home.php"><div id="esquerra"><img src="Logoyem.png" /></div></a>
            <div id="mig">
                <div><img src="lletra.png" alt="titul web" /></div>
                <nav>
                    <a href=""><div class="opcio">Fan</div></a>
                    <a href=""><div class="opcio">Perfil</div></a>

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
                <div><input type="text" placeHolder="Buscar..."/></div>
                <div><a href="">Sortir</a> </div>
            </div>
        </header>


        <div id="main">
            <?php
            require_once 'bbdd2.php';
//            if (isset($_SESSION["user"])) {
//                if ($_SESSION["type"] == "Fan") {
//                    $username = $_SESSION["user"];

            $username = 'fan1';
            ?>
            <section class = "banner left">
                <img src = "musica.png" alt = "banner"/>
            </section><section id = "content">


                <div id = "dalt">

                    <div id = "faninfo">
                        <div id = "img">img_fan</div>
                        <div id = "info">
                            <?php
                            $dades = selectDadesUsu($username);

                            while ($fila = mysqli_fetch_array($dades)) {
                                extract($fila);

                                echo '<b>Nom usuari:</b>  ' . $nom_usuari . '<br/>';
                                echo'<b>Nom:</b>  ' . $nom . '<br/>';
                                echo'<b>Cognoms:</b>  ' . $cognoms . '<br/>';
                                echo' <b>Telefon:</b>  ' . $telefon . '<br/>';
                                echo '  <b>Correu:</b>  ' . $email . '<br/>';
                            }
                            ?>
                        </div>
                    </div>

                    <!--id = "toptable" -->
                    <div id = "taulaconcerts">
                        <?php
                        $matriz = ProximsConcerts();
                        echo" <table>
                            PROXIMS CONCERTS
                         <tr>
                                <td><strong>Concert</strong></td>
                                <td><strong>Data</strong></td>
                            </tr>";


                        while ($fila = mysqli_fetch_array($matriz)) {
                            extract($fila);

                            echo "<tr>";
                            echo "<td>$nom</td><td>$data_concert</td><br>";
                            echo "</tr>";
                        }
                        echo '</table>';
                        ?>

                    </div>
                </div>

                <div id="taules"> 



                    <div class="taula">
                        <?php
                        if (isset($_POST["votarconcert"])) {



                            $id_concert = $_POST ["id_concert"];

                            insertarVotacioConcert($username, $id_concert);
                        } else if (isset($_POST["borrarvotacio"])) {


                            $id_concert = $_POST ["id_concert"];
                            eliminarVotacioConcert($username, $id_concert);
                        }


                        echo" <table>
                            VOTAR CONCERT
                         <tr >

                                <td><strong>Nom</strong></td>
                                <td><strong>Data</strong></td><td><strong>Votació</strong></td>
                                
                               
                            </tr>";

                        $concert = VotarConcert();
                        while ($fila = mysqli_fetch_array($concert)) {
                            extract($fila);


                            echo "<tr>";
                            echo "<td>$nom</td><td>$data_concert</td><td>";
                            if (checkvotacioconcert($username, $id_concert) == false) {
                                echo "<form action='' method='POST'>"
                                . "<input type='hidden' name='id_concert' value='$id_concert'>";
                                echo '<input type = "submit" name = "votarconcert" value = "Like">';

                                echo "</form>";
                            } else {
                                echo "<form action='' method='POST'>"
                                . "<input type='hidden' name='id_concert' value='$id_concert'>";
                                echo '<input type = "submit" name = "borrarvotacio" value = "Dislike">';
                                echo "</form>";
                            }
                            echo" </td><br>";

                            echo "</tr>";
                        }

                        echo '</table>';
                        ?>

                    </div>

                    <div class="taula">
                        <?php
                        if (isset($_POST["votarmusic"])) {

                            $nom_music = $_POST ["nom_usuari"];

                            insertarVotacioMusic($username, $nom_music);
                            
                            
                        } else if (isset($_POST["borrarmusic"])) {


                            $nom_music = $_POST ["nom_usuari"];
                            eliminarVotacioMusic($username, $nom_music);
                        }

                        echo" <table>
                            VOTAR MUSIC
                            <tr>
                            <td><strong>Music</strong></td>
                            <td><strong>Votació</strong></td>

                            </tr>";

                        $matriz = VotarMusic();
                        while ($fila = mysqli_fetch_array($matriz)) {
                            extract($fila);

                            echo "<tr>";
                            echo "<td>$nom_usuari</td><td>";
                            if (checkvotaciomusic($username, $nom_usuari) == false) {
                                echo "<form action='' method='POST'>"
                                . "<input type='hidden' name='nom_usuari' value='$nom_usuari'>";
                                echo '<input type = "submit" name = "votarmusic" value = "Like">';

                                echo "</form>";
                            } else {
                                echo "<form action='' method='POST'>"
                                . "<input type='hidden' name='nom_usuari' value='$nom_usuari'>";
                                
                                echo '<input type = "submit" name = "borrarmusic" value = "Dislike">';
                                echo "</form>";
                            }
                            echo" </td><br>";

                            echo "</tr>";
                        }
                        ?>

                    </div>                    
                </div>
                <?php
//                    } else {
//                        echo "No eres fan.";
//                    }
//                } else {
//                    echo "No estás autentificado.";
//                }
                ?>

            </section><section class="banner right">
                <img src="musica.png" alt="baner"/>
            </section>
        </div>


        <footer>
            <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>
