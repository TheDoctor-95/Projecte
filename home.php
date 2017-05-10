
<html>
    <head>
        <link href="home.css" rel="stylesheet" type="text/css"/>
        <link href="basic.css" rel="stylesheet" type="text/css" />
        <title>Mainpage</title>
        <meta charset="UTF-8">
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="slick/slick.min.js" type="text/javascript"></script>
        <link href="slick/slick.css" rel="stylesheet" type="text/css"/>
        <link href="slick/slick-theme.css" rel="stylesheet" type="text/css"/>
        <script src="home.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
    require_once 'bbdd2.php';
    session_start();
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location:home.php");
    }
    
    ?>
    <body>
        <div class='login'>
            <span class='close'> X</span>
            <form action='' method='POST'>
                <p>Nombre de usuario</p>
                <p><input type="text" name='user' /></p>
                <p>Contraseña</p>
                <p><input type="password" name='pass' /></p>
                <p><input type="submit" name='login' value='LOG IN'/></p>
                <?php
                if (isset($_POST["login"])) {
                    echo '<script>'
                    . '$(document).ready(ini);'
                    . 'function ini(){'
                    . '$("#fondo, .login").show()
                        
    $("#login").off();
    $(".close, #fondo").click(close);
                            }'
                    . '</script>';
                    $user = $_POST["user"];
                    if (verificaruser($user, $_POST["pass"])) {
                        echo "<p> VAMOS A ENTRAR </p>";
                        $type = getUserType($user);

                        $_SESSION["user"] = $user;
                        $_SESSION["type"] = $type;
                        if ($type == "Music") {
                            header("Location:Music.php");
                        } else if ($type == "Fan") {
                            header("Location:fan.php");
                        } else if ($type == "Local") {
                            header("Location:Local.php");
                        } else {
                            
                        }
                    } else {
                        echo "<p class='error'>Nom d'usuari o contrasenya incorrecte</p>";
                    }
                }
                ?>
            </form>
        </div>
        <div id='fondo'></div>



        <header>
            <a href="home.php"><div id="esquerra"><img src="Logoyem.png" /></div></a>
            <div id="mig">
                <div><img src="lletra.png" /></div>
                <nav>

                    <div class="opcio"><a href="Quisom.php" >Qui sóm</a></div>
                    <div class="opcio">Notícies</div>

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
                <div><?php if(isset($_SESSION["user"])){
                    ?>
                    <form action='' method='POST'>
                        <button name='logout'>Log Out</button>
                    </form>
 <?php
                }else{?>
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
                            $grups = selectMusicsHome();
                            while ($grup = mysqli_fetch_array($grups)) {
                                extract($grup);
                                $nota = number_format($nota, 1);
                                echo"<tr >
                                    <td>$nom_grup</td>
                                    <td>$nom</td>
                                    <td>$nota</td>
                                    <tr>";
                            }
                            ?>
                        </table>
                    </div>     

                </div>
                <div class="publi">
                    <div><img src= "cover_blank.png" alt="publicitat" title="publicitat"/></div>
                    <div><img src= "musik.jpg" alt="publicitat" title="publicitat"/></div>
                    <div><img src= "rock.jpg" alt="publicitat" title="publicitat"/></div>
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
