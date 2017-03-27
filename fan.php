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
                    <a href=""><div class="opcio">Botiga</div></a>
                    <a href=""><div class="opcio">Notificacions</div></a>
                </nav>

            </div>
            <div id="dreta">
                <div> <a href="https://www.facebook.com/"><img src="facebook.png" alt="facebook"/></a><a href="https://www.twitter.com/"><img src="twitter.png" alt="twiter" /></a><a href="https://plus.google.com/"><img src="Google.png" alt="google+" /></a></div>
                <div id="idioma_sel">
                    <div>IDIOMA <img src="flechaNegra.png"></div>
                    <div class="idiomes">
                        <p><img src="cat.jpg"> Català </p>
                        <p><img src="cas.jpg"> Castellà </p>
                        <p><img src="eng.jpg"> Anglès</p>
                    </div>
                </div>
                <div><input type="text" placeHolder="buscar..."/></div>
                <div><a href="">log out</a> </div>
            </div>
        </header>


        <div id="main">

            <section class="banner left">
                <img src="musica.png" alt="baner"/>
            </section><section id="content">


                <div id="dalt">
                    <div id="faninfo">
                        <div id="img">img_fan</div>
                        <div id="info">
                            <b>Nom:</b><br/>                       
                            <b>Telefon:</b><br/>
                            <b>Correu:</b><br/>

                        </div>
                    </div>

                    <!--id="toptable"-->
                    <div id="taulaconcerts">       
                        <?php
                        require_once 'bbdd2.php';
                        $matriz = ProximsConcerts();
                        echo" <table>
                            PROXIMS CONCERTS
                         <tr>
                                <td><strong>Concert</strong></td>
                                <td><strong>Data</strong></td>
                            </tr>";


                        while ($fila = mysqli_fetch_array($matriz)) {
                            extract($fila);
                            //Las variables que genera extract tendran el mismo nombre que los campos en la bbdd
                            //Mostramos los datos
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
                 

                        $music = VotarMusicConcert();
                        echo" <table>
                            PROXIMS CONCERTS
                         <tr >

                                <td><strong>Music</strong></td>
                                <td><strong>Data</strong></td>
                               
                            </tr>";


                        while ($fila = mysqli_fetch_array($music)) {
                            extract($fila);
                            //Las variables que genera extract tendran el mismo nombre que los campos en la bbdd
                            //Mostramos los datos
                            echo "<tr>";
                            echo "<td>$nom_usuari</td><td>$datahora</td>";
                            echo "<td><select name='registre' required>
                                        <option value='0'>-1</option>
                                        <option selected></option>
                                        <option value='1'>1</option>
                                    </select></td><br>";
                            echo "</tr>";
                        }
                        echo '</table>';
                        ?>

                    </div>

                    <div class="taula">
                        <?php
                     
                        $matriz = VotarLocalConcert();
                        echo" <table>
                            PROXIMS CONCERTS
                         <tr>
                                <td><strong>Concert</strong></td>
                                <td><strong>Data</strong></td>
                            </tr>";


                        while ($fila = mysqli_fetch_array($matriz)) {
                            extract($fila);
                            //Las variables que genera extract tendran el mismo nombre que los campos en la bbdd
                            //Mostramos los datos
                            echo "<tr>";
                            echo "<td>$nom_usuari</td><td>$data_concert</td><br>";
                            echo "<td><select name='registre' required>
                                        <option value='0'>-1</option>
                                        <option selected></option>
                                        <option value='1'>1</option>
                                    </select></td><br>";
                            echo "</tr>";
                        }
                        echo '</table>';
                        ?>

                    </div>                    
                </div>


            </section><section class="banner right">
                <img src="musica.png" alt="baner"/>
            </section>
        </div>




        <footer>
            <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>
