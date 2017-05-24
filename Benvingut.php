<html>
    <head>
        <meta charset="UTF-8">
        <link href="basic.css" rel="stylesheet" type="text/css"/>
        <link href="quisom.css" rel="stylesheet" type="text/css" />
        <link href="basic.css" rel="stylesheet" type="text/css"/>
        <title>Qui Som</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <a href="home.php"><div id="esquerra"><img src="Logoyem.png" /></div></a>
            <div id="mig">
                <div><img src="lletra.png" /></div>
                <nav>
                    <a href="Home.php"><div class="opcio">Home</div></a>
                    <a href="Quisom.php"><div class="opcio">Qui sóm</div></a>
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
                <div><?php if (isset($_SESSION["user"])) {
   ?>
                    <form action='' method='POST'>
                        <button name='logout'>Log Out</button>
                    </form>
                    <?php } else {
                        ?>
                        <span id='login'> Entra 

                        </span>
                        || <a href="registre.php">Registra't</a> </div>
                <?php } ?>
            </div>
        </header>
        <div id="main">
            <section class="banner left">
                <img src= "musica.png" alt="musica" title="musica" width="10" height="500"/>
            </section><section id="content">
                <div class="mdiv">
                    <p>
                        Instruccions d'ús de la pàgina
                        <br><br>
                        Les funcionalitats d'aquesta pàgina estan dividides en funció del tipus d'usuari que s'hi registra:<br>
                        * Music: Artistes o Grups Musicals<br>
                        * Local: Propietaris de locals interessats en organitzar concerts<br>
                        * Fan: Persones interessades en anar a veure els concerts<br><br>
                        Avans de res, heu de seleccionar la opció "Registra't" o "Entra", si ja esteu registrats, en el Menú superior de la dreta.

                    </p></div>     
            </section><section class="banner right">
                <img src= "musica.png" alt="musica" title="musica" width="10" height="500"/>
            </section>
        </div>
        <footer>
            <span>Your Easy Music</span> <a href='Quisom.php'>Qui Som</a> | <a href=''> Copyright</a>
        </footer>

        <?php
        // put your code here
        ?>
    </body>
</html>