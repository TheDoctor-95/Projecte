<!DOCTYPE html>

<html>
    <head>

        <title>LOCAL</title>
        <link href="Local.css" rel="stylesheet" type="text/css" />
        <link href="basic.css" rel="stylesheet" type="text/css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        require_once './bbdd2.php';
        ?>

        <header>
            <a href="home.php"><div id="esquerra"><img src="Logoyem.png" /></div></a>
            <div id="mig">
                <div><img src="lletra.png" /></div>
                <nav>
                    <a href="Local.php"><div class="opcio">Local</div></a>
                    <a href="Perfil_Local.php"><div class="opcio">Perfil</div></a>
                    <a href=""><div class="opcio">Botiga</div></a>
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
                <div><a href="">log out</a> </div>
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
                                <p>Nom <input type="text" name="name_concierto" /></p>
                                <p>Data concierto <input type="date" name="data concierto" /></p>
                                <p>Grups necesaris: <input type="number" name="data concierto" /></p>
                                <p> GENERO:
                                    <select name="genero">
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                    </select></p>
                                <p><input type="submit" value="Añadir" /></p>
                            </form>
                        </div>
                    </div>

                </header>
                <div id="table">
                    <table>
                        <tr id="toptable">
                            <td>Concert</td>
                            <td>Data i Hora</td>
                            <td>Estat</td>
                            <td>Modificar</td>
                            <td>x</td>
                        </tr>
                        <?php
                        $concerts = selectConcertsLocal("local1");
                        while ($concert = mysqli_fetch_array($concerts)) {
                            extract($concert);
                            echo"<tr >
                                    <td>$nom</td>
                                    <td>$data_concert</td>
                                    <td>";
                            $apuntats = mysqli_fetch_array(contaApuntats($id_concert));
                            extract($apuntats);
                            echo "$apun Musics Apuntas id: $id_concert";
                            if ($apun != 0) {
                                echo "<div>";
//                               while ($nom_apuntats = mysqli_fetch_array(selectApuntats($id_concert))){
//                                   extract($nom_apuntats);
//                                   echo "<p>$nom_usuari</p>";
//                               }
                                echo "</div>";
                            }
                            echo "</td><td>Modificar</td>
                                            <td>x</td>
                                        </tr>";
                        }
                        ?>
                        <tr>
                            <td>Concert</td>
                            <td>Data</td>

                            <td>0 muscis apuntats
                                <div><p>music 1</p><p>music 1</p><p>music 1</p></div></td>
                            <td>Modificar</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td>Concert</td>
                            <td>Data</td>

                            <td>0 muscis apuntats
                                <div><p>music 1</p><p>music 1</p><p>music 1</p></div></td>
                            <td>Modificar</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td>Concert</td>
                            <td>Data</td>

                            <td>0 muscis apuntats
                                <div><p>music 1</p><p>music 1</p><p>music 1</p></div></td>
                            <td>Modificar</td>
                            <td>x</td>
                        </tr><tr>
                            <td>Concert</td>
                            <td>Data</td>
                            <td>0 muscis apuntats
                                <div><p>music 1</p><p>music 1</p><p>music 1</p></div></td>
                            <td>Modificar</td>
                            <td>x</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>more</td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>
                </div>
            </section><section class="banner right">
                <img src= "musica.png" alt="musica" title="musica" />
            </section>
        </div>
        <footer>
            <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>
