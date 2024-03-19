<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Tolitamal</title>
</head>

<body>
    <?php 
    require "../Controller/connection.php";
    require "../Controller/funciones.php";
    require "../Controller/variables.php";
    include "./navbar.php";
    ?>
    <section>
        <div class="section--container">
            <?php
            $error = '';
            date_default_timezone_set('America/Lima');
            $hora =  date("H:i:s");
            $rol = set_rol();

            if (($rol == 'Cajero' || $rol == 'Mesero') && !isset($_SESSION['admin'])) {
                echo '<p class="msg">El administrador debe habilitar el dispositivo</p>';
            }
            /* $pwd = password_hash($pwd, PASSWORD_DEFAULT, ['cost' => 10]); para encriptar */
            ?>
            
            <form action='../Controller/variables.php' class="form" method="POST">
                <div class="section--input">
                    <p class="text-email">Email</p>
                    <input type="mail" class="input" name="correo" id="correo" placeholder="user@example.com">
                    <p class="text-email-err"></p>
                </div>
                <div class="section--pwd section--input">
                    <p class="text-pwd">Password</p>
                    <div class="container--pwd"><!-- dssds -->
                        <input type="password" class="input-pwd-eye pwd" name="pwd" id="pwd" placeholder="**********"
                            disabled>
                        <img src="../img/ojo_abierto.png" class="img_pwd" alt="eye-password" hidden>
                    </div>
                    <?php echo "<div class='msg'></div>"; ?> <!-- verificar -->
                </div>
                <div class="err1 text-error"></div>
                <div class="section--submit">
                    <input type="submit" class="send disabled-button" name="submit_login" id="" value="LOGIN" onClick="validar()" disabled>
                    <a href="./pwd_recovery.html">Forgot my password</a>
                </div>
            </form>
        </div>
    </section>
</body>
<script src="../Js/login.js"></script>
</html>