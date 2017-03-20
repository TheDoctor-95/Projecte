
<html>
    <head>
        <link href="home.css" rel="stylesheet" type="text/css"/>
        <link href="basic.css" rel="stylesheet" type="text/css" />
        <title>Mainpage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <?php
        require_once 'bbdd2.php';
        ?>
        <header>
            <a href="home.php"><div id="esquerra"><img src="Logoyem.png" /></div></a>
            <div id="mig">
                <div><img src="lletra.png" /></div>
                <nav>

                    <div class="opcio">Qui sóm</div>
                    <div class="opcio">Concerts</div>
                    <div class="opcio">Notícies</div>
                    <div class="opcio">Botiga</div>

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
                <img src= "musica.png" alt="musica" title="musica" width="10" height="500"/>
            </section><section id="content">
                <div class="mdiv">
                    <div class="taula">
                        <div id="ttaula">
                            Pròximes actuacions
                        </div>
                        <br>
                        <table class="table">
                            <tr>
                                <th>Concert</th>
                                <th>Local</th>
                                <th>Data</th>
                            </tr>
                            <?php
                        $concerts = selectConcertsHome();
                        while ($concert = mysqli_fetch_array($concerts)) {
                            extract($concert);
                            echo"<tr >
                                    <td>$nom</td>
                                    <td>$nom_local</td>
                                    <td>$data_concert</td>
                                    <tr>";
                                                    }
                        ?>
                        </table>
                    </div>
                    <div class="taula">
                        <div id="ttaula">
                            Ranking Músics
                        </div>
                        <br>
                        <table class="table">
                            <tr>
                                <th>Grup Musical</th>
                                <th>Estil</th>
                                <th>Nota</th>
                            </tr>
                           <?php
                        $concerts = selectConcertsHome();
                        while ($concert = mysqli_fetch_array($concerts)) {
                            extract($concert);
                            echo"<tr >
                                    <td>$nom</td>
                                    <td>$nom_local</td>
                                    <td>$data_concert</td>
                                    <tr>";
                                                    }
                        ?>
                        </table>
                    </div>     
                    <div class="publi"><img src= "cover_blank.png" alt="publicitat" title="publicitat"/></div>
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
