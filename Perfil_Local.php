<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="Perfil_Local.css" rel="stylesheet" type="text/css"/>
        <link href="basic.css" rel="stylesheet" type="text/css"/>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
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


            </section><section class="banner right">
                <img src= "musica.png" alt="musica" title="musica"/>
            </section>
        </div>
        <footer>
            <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>
