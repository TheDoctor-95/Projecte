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
                                            <p>Data naixement</p><p><input type="date" name="fnac" /></p>

                                        </div>
                                        <div>
                                            <p>Telèfon:</p><p> <input type="text" name="tel"></p>
                                            <p>Direcció:</p><p> <input type="text" name="postal"></p>                              
                                            <p>Genere:</p>
                                            <p><select name="genero" >
                                                    <?php
                                                    ?>
                                                </select>
                                            </p>
                                            <p>Ciutat</p>
                                            <p><select name="ciutat">
                                                    <?php
                                                    ?>
                                                </select></p>

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
                                            <p>Ciutat*: </p><p> <input type="text" name="ciutat" required /></p> 
                                            <p> IMG:  </p>
                                        </div>
                                        <div>
                                            <p>Direcció*: </p><p><input type="text" name="direccio" /></p>                             
                                            <p>Telèfon*: </p><p> <input type="tel" name="tel"></p>
                                            <p>Gènere que es toca al local*:   
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
                                            <p>Aforo: </p><p> <input type="number" name="aforo"></p>
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

                                        </div>
                                        <div>
                                            <p>Imatge:</p>
                                            <p>insertar aqui imagen<label></label></p>
                                            <p>Web*: </p><p><input type="url"  name="web"><label></label></p>
                                            <p>Discogràfica*: </p><p><input type="text"  name="discografica"><label></label></p>
                                            <p>Numero de membres del grup*: </p><p><input type="number"  name="nummembres"><label></label></p>
                                            <p>Gènere del grup*:</p>
                                            <p><select name="genere">

                                                </select><label></label>
                                            </p>
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
