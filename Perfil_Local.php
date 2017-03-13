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
                <form action="">
            <br />                                                                    
                                    Nick o nom d'usuari*: <input type="text"  name="usu" required> 
                                    <br />
                                    <br />
                                    Contrasenya*:<input type="password" name="fpasswd" required>
                                    <br />
                                    <br />
                                    Repeteix la contrasenya*:<input type="password" name="fpasswd2" required>
                                    <br />
                                    <br />
                                    Email*: <input type="email" placeholder="Email" name="email" required> 
                                    <br />
                                    <br />
                                    Nom del local*:  <input type="text"  name="nomlocal" required>                                                                         
                                    <br />
                                    <br />
                                    Ciutat*:  <input type="text" name="ciutat" required>                                  
                                       <br />
                                    <br />
                                    Imatge:
                                    --> 
                    </form>


                
            </section><section class="banner right">
                <img src= "musica.png" alt="musica" title="musica"/>
            </section>
        </div>
        <footer>
            <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>
