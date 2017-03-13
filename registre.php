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

    </head>
    <body>
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
                <img src= "musica.png" alt="musica" title="musica"/>
            </section><section id="content">

                <div id="titol"> 
                    <h1> REGISTRE</h1>
                </div>

                <div id="formulari">
                    
                    <form action="formulario02.php" autocomplete="on" method="get">

                        <div id="blocs">
                            <div class=" bloc_preguntes">                           
                                <div class="preguntes">                                                                  

                                    <br />
                                    <br />
                                    Escull una opció: <select name="registre" required>
                                        <option value="1">Fan</option>
                                        <option value="2">Músic</option>
                                        <option value="3">Local</option>              
                                    </select>
                                    

                                    <!-- FAN  
                                    <br />
                                    <br />                                                                       
                                    Nom: <input type="text"  name="fname"> 
                                    <br />
                                    <br />
                                    Cognoms:<input type="text"  name="fsurname"> 
                                    <br />
                                    <br />
                                    Nick o nom d'usuari*: <input type="text"  name="usu" required> 
                                    <br />
                                    <br />
                                    Contrasenya*:<input type="password" name="fpasswd" >
                                    <br />
                                    <br />
                                    Repeteix la contrasenya*:<input type="password" name="fpasswd2" >
                                    <br />
                                    <br />
                                    Email*: <input type="email"  name="email" required>    
                                       <br />
                                    <br />
                                    Imatge:
                                    -->

                                    <!-- LOCAL 
                                    <br />
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


                                    <!-- MÚSIC -->
                                    <br />
                                    <br />
                                    Nick o nom d'usuari*: <input type="text"  name="usu" required> 
                                    <br />
                                    <br />
                                    Contrasenya*:<input type="password" name="fpasswd" >
                                    <br />
                                    <br />
                                    Repeteix la contrasenya*:<input type="password" name="fpasswd2" >
                                    <br />
                                    <br />
                                    Email*: <input type="email"  name="email" required> 
                                    <br />
                                    <br />
                                    Nom del grup/cantant*: <input type="text"  name="nomgrup">    
                                    <br />
                                    <br />
                                    Imatge:







                                    </form>
                                </div>

                            </div>

                            <div class=" bloc_preguntes">

                                <div class="preguntes">
                                    <br />
                                    <br />

                                    <!-- FAN 
                                    Telèfon: <input type="text" name="tel">                                                            
                                    <br />
                                    <br />
                                    Direcció: <input type="number" name="postal">                                    
                                    <br />
                                    <br />

                                    Generes de música preferits*:  
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
                                        <br />
                                        <input type="checkbox" name="generes" value="electro">Electrònica
                                        <br />
                                        Altres <input type="text" name="altres" > 
                                    
                                    

                                    -->    


                                    <!-- LOCAL 
                                                                       
                                    Direcció*: <input type="text" name="direccio">                                      
                                    <br />
                                    <br />
                                    Telèfon*:  <input type="number" name="tel">                                                                    
                                    <br />
                                    <br />
                                    Gènere que es toca al local*:   
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
                                        <br />
                                        <input type="checkbox" name="generes" value="electro">Electrònica
                                        <br />
                                        Altres <input type="text" name="altres" > 

                                    <br />
                                    <br />
                                    Aforo:  <input type="number" name="aforo">                                                                      
                                    <br />
                                    <br />
                                    -->


                                    <!-- MÚSIC -->
                                    Web*: <input type="url"  name="web">
                                    <br />
                                    <br />
                                    Discogràfica*: <input type="text"  name="discografica">
                                    <br />
                                    <br />                                  
                                    Numero de membres del grup*: <input type="number"  name="nummembres">
                                    <br />
                                    <br />

                                    Gènere del grup*:
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
                                    <br />
                                    <input type="checkbox" name="generes" value="electro">Electrònica
                                    <br />
                                    Altres <input type="text" name="altres" > 




                                </div>

                            </div>
                            <div id="submit">
                                <input type="submit" value="Registrate"/>

                            </div>
                        </div>

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
