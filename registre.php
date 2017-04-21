<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="registre.css" rel="stylesheet" type="text/css"/>
        <link href="basic.css" rel="stylesheet" type="text/css" />
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="jquery.validate.js" type="text/javascript"></script>
        <script src="registre.js" type="text/javascript"></script>

    </head>
    <body>
        <?php
        require_once './BBDD_registre.php';
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
                <div><input type="search" placeHolder="buscar..."/></div>
                <div><a href="">log out</a> </div>
            </div>
        </header>




        <div id="main">

            <section class="banner left">
                <img src= "musica.png" alt="musica" title="musica"/>
            </section><section id="content">

                <?php
                if (isset($_POST["fan"])) {
                    $usu = $_POST["usu"];
                    $fpasswd = $_POST["fpasswd"];
                    $fpasswd2 = $_POST["fpasswd2"];
                    $fname = $_POST["fname"];
                    $fsurname = $_POST["fsurname"];
                    $email = $_POST["email"];
                    $fnac = $_POST["fnac"];
                    $tel = $_POST["tel"];
                    $direccio = $_POST["direccio"];
                    $ciutat = $_POST["ciutat"];
                    $genero = $_POST["genero"];

                    insertFan($usu, $fpasswd, $fname, $fsurname, $email, $fnac, $tel, $direccio, $ciutat, $genero);
                }
                ?>
                <?php
                if (isset($_POST["local"])) {
                    $usu = $_POST["usu"];
                    $fpasswd = $_POST["fpasswd"];
                    $fpasswd2 = $_POST["fpasswd2"];
                    $email = $_POST["email"];
                    $nomlocal = $_POST["nomlocal"];
                    $direccio = $_POST["direccio"];
                    $ciutat = $_POST["ciutat"];
                    $tel = $_POST["tel"];
                    $genero = $_POST["genero"];


                    insertLocal($usu, $fpasswd, $email, $nomlocal, $direccio, $ciutat, $tel, $genero);
                }
                ?>
                <?php
                if (isset($_POST["music"])) {
                    $usu = $_POST["usu"];
                    $fpasswd = $_POST["fpasswd"];
                    $fpasswd2 = $_POST["fpasswd2"];
                    $email = $_POST["email"];
                    $nomgrup = $_POST["nomgrup"];
                    $web = $_POST["web"];
                    $nummembres = $_POST["nummembres"];
                    $ciutat = $_POST["ciutat"];
                    $genere = $_POST["genero"];

                    insertMusic($usu, $fpasswd, $email, $nomgrup, $web, $nummembres, $ciutat, $genere);
                }
                ?>

                <div id="botons">
                    <button id="fan">FAN</button><button id="local">LOCAL</button><button id="music">MUSIC</button>
                </div>
                <div id="formulari">



                    <div id="blocs">

                        <div class=" bloc_preguntes">                          
                            <div class="preguntes">                                                                  
                                <div class="fan">
                                    <form id ="formfan" action="" method="POST" >
                                        <div>
                                            <p><input type="hidden" value="fan" name="type" /></p>
                                            <p>Nick o nom d'usuari*: </p><p><input type="text"  name="usu" required /> </p>
                                            <p>Contrasenya*:</p><p><input type="password" name="fpasswd" /> </p>
                                            <p>Repeteix la contrasenya*:</p><p><input type="password" name="fpasswd2" /></p>
                                            <p>Nom: </p><p> <input type="text"  name="fname" /> </p>
                                            <p>Cognoms:</p><p><input type="text"  name="fsurname" /> </p>
                                            <p>Email*:</p><p> <input type="email"  name="email" required /></p>    


                                        </div>
                                        <div>
                                            <p>Data naixement</p><p><input type="date" name="fnac" /></p>
                                            <p>Telèfon:</p><p> <input type="text" name="tel"></p>
                                            <p>Direcció:</p><p> <input type="text" name="direccio"></p> 
                                            <p>Ciutat</p> 
                                            <p><select name="ciutat">
                                                    <?php
                                                    $ciutats = selectCiutats();
                                                    while ($fila = mysqli_fetch_array($ciutats)) {
                                                        extract($fila);
                                                        echo "<option value='$id_ciutat'>$nom</option>";
                                                    }
                                                    ?>
                                                </select></p>
                                            <p>Genere:</p>
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



                                            <p> IMG: </p>
                                            <p> input imatge </p>
                                        </div>
                                        <div class="submit"><input type="submit" value="Registrate" name="fan" /></div>
                                    </form>





                                </div>


                                <div class ="local" >
                                    <form id ="formlocal" action="" method="POST" >
                                        <div>
                                            <p><input type="hidden" value="local" name="type" /></p>
                                            <p>Nick o nom d'usuari*:</p><p> <input type="text"  name="usu" required /> </p>
                                            <p>Contrasenya*:</p><p><input type="password" name="fpasswd" /> </p>
                                            <p>Repeteix la contrasenya*:</p><p><input type="password" name="fpasswd2" /></p>
                                            <p>Email*: </p><p><input type="email"  name="email" required /> </p>
                                            <p>Nom del local*: </p><p> <input type="text"  name="nomlocal" required /></p>


                                        </div>
                                        <div>
                                            <p>Direcció*: </p><p><input type="text" name="direccio" /></p> 
                                            <p>Ciutat</p>
                                            <p><select name="ciutat">
                                                    <?php
                                                    $ciutats = selectCiutats();
                                                    while ($fila = mysqli_fetch_array($ciutats)) {
                                                        extract($fila);
                                                        echo "<option value='$id_ciutat'>$nom</option>";
                                                    }
                                                    ?>
                                                </select></p> 
                                            <p>Telèfon*: </p><p> <input type="tel" name="tel"></p>
                                            <p>Genere:</p>
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
                                            <p> IMG:  </p>
                                            <p> input imatge </p>
                                        </div>
                                        <div><input type="submit" value="Registrate" name="local" /></div>
                                    </form>

                                </div>

                                <div class="music">
                                    <form id ="formmusic" action="" method="POST" >
                                        <div><p><input type="hidden" value="music" name="type" /></p>
                                            <p>Nick o nom d'usuari*:</p><p><input type="text"  name="usu" required> <label> </label></p>
                                            <p>Contrasenya*:</p><p><input type="password" name="fpasswd" required><label></label> </p>
                                            <p>Repeteix la contrasenya*:</p><p><input type="password" name="fpasswd2" required><label></label><p>
                                            <p>Email*: </p><p><input type="email"  name="email" required><label></label> </p>    
                                            <p>Nom del grup/cantant*: </p><p><input type="text"  name="nomgrup"> <label></label>   </p>
                                            <p>Web*: </p><p><input type="url"  name="web"><label></label></p>
                                        </div>
                                        <div>


                                            <p>Discogràfica*: </p><p><input type="text"  name="discografica"><label></label></p>
                                            <p>Numero de membres del grup*: </p><p><input type="number"  name="nummembres"><label></label></p>
                                            <p>Ciutat</p>
                                            <p><select name="ciutat">
                                                    <?php
                                                    $ciutats = selectCiutats();
                                                    while ($fila = mysqli_fetch_array($ciutats)) {
                                                        extract($fila);
                                                        echo "<option value='$id_ciutat'>$nom</option>";
                                                    }
                                                    ?>
                                                </select></p>
                                            <p>Gènere del grup*:</p>
                                            <p><select name="genere">
                                                    <?php
                                                    $generos = selectGenere();
                                                    while ($fila = mysqli_fetch_array($generos)) {
                                                        extract($fila);
                                                        echo "<option value='$id_estil'>$nom</option>";
                                                    }
                                                    ?>
                                                </select><label></label>
                                            </p>
                                            <p>Imatge:</p>
                                            <p>insertar aqui imagen<label></label></p>

                                        </div>
                                        <div><input type="submit" value="Registrate" name="music" /></div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>       


            </section><section class="banner right">
                <img src= "musica.png" alt="musica" title="musica"/>
            </section>
        </div>
        <footer>
            <span>Your Easy Music</span> <a href='Quisom.php'>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>
