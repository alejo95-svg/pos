<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    .container-form {
        width: 100vw;
        height: 70vh;
        display: grid;
        justify-content: center;
        align-items: center;
    }

    .form {
        display: flex;
        flex-direction: column;
        width: 300px;
        align-items: center;
        border-radius: 12px;
        background-color: #FFE8CA;
    }

    .form p {
        font-family: monospace;
        width: 250px;
        margin-top: 12px;
    }

    .input {
        margin-bottom: 16px;
        width: 250px;
        height: 30px;
        padding-inline-start: 12px;
        border-radius: 12px;
        border: none;
        background-color: #FFD3CA;
    }

    .button {
        margin: 20px;
        width: 250px;
        height: 50px;
        border: none;
        border-radius: 12px;
        background-color: #FF5733;
        color: white;
        font-weight: bold;
        font-size: 20px;
    }
</style>

<body>
    <div class="container-form">
        <form action="" class="form" method="POST">
            <p>Email</p>
            <input type="email" class="input" name="email">
            <p>Password</p>
            <input type="text" class="input" name="pwd">

            <p>Email 2</p>
            <input type="email" class="input" name="email2">
            <p>Password 2</p>
            <input type="text" class="input" name="pwd2">
            <input type="submit" class="button" name="send">
        </form>
    </div>
    <br>
    <?php

    include './Model/class_rol.php';
    if (isset($_POST['send'])) {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $email2 = $_POST['email2'];
        $pwd2 = $_POST['pwd2'];

        $usuario = new rol($email, $pwd);
        $usuario2 = new rol($email2, $pwd2);

        $data = $usuario->rol();
        $data2 = $usuario2->rol();

        if ($data[0]) {
            switch ($data[1]) {
                case true:
                    echo '<p style="text-align:center;">El usuario con correo ' . $email . ' es Administrador</p>';
                    break;
                case false:
                    echo '<p style="text-align:center;">El usuario con correo ' . $email . ' NO es Administrador</p>';
                    break;
            }
        } else {
            echo '<p style="text-align:center;">El usuario con correo ' . $email . ' NO existe</br>';
        }

        echo '<br>';

        if ($data2[0]) {
            switch ($data2[1]) {
                case true:
                    echo '<p style="text-align:center;">El usuario con correo ' . $email2 . ' es Administrador</br>';
                    break;
                case false:
                    echo '<p style="text-align:center;">El usuario con correo ' . $email2 . ' NO es Administrador</br>';
                    break;
            }
        } else {
            echo '<p style="text-align:center;">El usuario con correo ' . $email2 . ' NO existe</br>';
        }
    }
    ?>

</body>

</html>