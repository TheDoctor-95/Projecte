
<html>
    <head>
        <link href="Music.css" rel="stylesheet" type="text/css"/>
        <title>Music</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="basic.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <div id="esquerra">
                <img src= "logoyem.png" alt="logoyem" title="logoyem"/>
            </div><div id="mig">
                <div><img src="lletra.png" alt="titul" /></div>
                <nav>
                    <div class="opcio">Music</div>
                    <div class="opcio">Perfil</div>
                    <div class="opcio">Concerts</div>
                    <div class="opcio">Botiga</div>
                    <div class="opcio">Notificacions/Avisos</div>
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
                <div>search</div>
                <div><a href="">log out</a> </div>
            </div>
        </header>
        <div id="main">
            <section class="banner left">
                <img src= "musica.png" alt="musica" title="musica" width="10" height="500"/>
            </section><section id="content">
                <div class="mdiv">
                    <header id="ttaula">Proximes actuacions acordades previstes

                    </header> 
                    <div class="taula">
                        <table>
                            <tr id="toptable" class="center">
                                <td>Concert</td>
                                <td>Data/Hora</td>
                                <td>Estat</td>
                                <td>Modificar</td>
                            </tr>
                                    <?php
                                    require_once 'bbddmusic.php';
                                    $musica = selectConcertsConfirm("bbb");
                                    
                                    while ($fila = mysqli_fetch_array($musica)) {
                                        extract($fila);
                                        echo "<tr>";

                                        echo "<td>$nom</td>";
                                        echo "<td>$data_concert</td>";
                                        echo "<td>$confirmacio</td>";
                                        echo "<td>Modificar</td>";

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
                                        <td>Concert</td>
                                        <td>Data/Hora</td>
                                        <td>Estat</td>
                                        <td>Modificar</td>
                                    </tr>
                                    <?php
                                    $musica = selectConcertsUnconfirm("aaa");
                                    
                                    while ($fila = mysqli_fetch_array($musica)) {
                                        extract($fila);
                                        echo "<tr>";

                                        echo "<td>$nom</td>";
                                        echo "<td>$data_concert</td>";
                                        echo "<td>$confirmacio</td>";
                                        echo "<td>Modificar</td>";

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
            <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>
