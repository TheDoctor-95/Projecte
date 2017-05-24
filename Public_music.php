<html>
    <head>
        <link href="Perfil_Local.css" rel="stylesheet" type="text/css"/>
        <link href="basic.css" rel="stylesheet" type="text/css"/>
        <link href="quisom.css" rel="stylesheet" type="text/css" />
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="perfil.js" type="text/javascript"></script>
        <title>Public Music</title>
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
                    <div class="opcio"><?php 
                    if(isset($_SESSION["type"])){
                    $type = $_SESSION["type"];
                    if ($type == "Fan") {
                            echo '<a href="fan.php" >';
                        } else if ($type == "Local") {
                            echo '<a href="Local.php" >';
                        } else if ($type == "Music") {
                            echo '<a href="Music.php" >';
                        }                  
                     echo $type;
                    }else{
                        echo '<a href="Benvingut.php" >';
                        echo "Benvingut";
                    }
                        ?></div>
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
                <img src= "musica.png" alt="musica" title="musica"/>
            </section><section id="content">

                    <div class="mdiv">
                        <?php
                        require_once './bbddmusic.php';
                        if (isset($_GET['music'])) {
                            $music = $_GET["music"];

                            $datos = selectUsubyNameM($music);
                            $fila = mysqli_fetch_array($datos);
                            extract($fila);




                            echo "<p>Nom del Grup: $nom_grup</p>";
                            echo "<p>Email: $email</p>";
                            echo "<p>Número de components: $numero_components</p>";
                            echo "<p>Web: $web</p>";
                            echo "<p>Telefon: $telefon</p>";
                            echo "<p>Data de formació del grup: $data_formacio</p>";

                            $genero = selectGeneresbyname($id_estil);

                            echo "<p>Genere musical preferit: $genero</p>";
                        }
                        //$img = $_POST["img"];
                        ?>
                        </p></div>  


            </section><section class="banner right">
                <img src= "musica.png" alt="musica" title="musica"/>
            </section>
        </div>
        <footer>
            <span>Your Easy Music</span> <a href=''>Qui Som</a> | <a href=''> Copyright</a>
        </footer>
    </body>
</html>