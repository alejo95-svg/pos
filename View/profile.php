<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/cd8ffc90f9.js" crossorigin="anonymous"></script>
    <title>Tolitamal</title>
</head>

<body>
    <?php
    include('../Controller/includes.php');
    $data = consulta_usuario($_SESSION['employee']);
    $src = ($data[0]['image'] != null)? "data:image/jpg;base64, " .base64_encode($data[0]['image']) : $src = "../img/default-profile.png";
    if (isset($_SESSION['flag'])) {
        msg();
        unset($_SESSION['flag'], $_SESSION['msg']);
        echo '<script>setTimeout("document.location.reload()",2000);</script>';
    }
    ?>

    <h3>Información de perfil</h3>
    <div class="container-profile-image">
        <img src="<?php echo $src?>" class="profile_image_home" alt="profile-image">
        <form action="../Controller/variables.php" method="POST" enctype="multipart/form-data">
            <div class="button-container">
                <label class="button-edit-image" for="edit"><i class="fa-solid fa-pen-to-square edit-image"
                        name='edit-image'></i></label>
                <input type="file" class="upload_image" id="edit" name="image">
            </div>
            <div class="btn-image"></div>
        </form>
    </div>

    <div class="container-info">
        <form action="../Controller/variables.php" class="form-info" method="POST">
            <input type="text" name="pNombre" class="input-form-profile" id="nombre_1" placeholder="Primer nombre"
                value="<?php echo $data[0]['name_1'] ?>" disabled>
            <input type="text" name="sNombre" class="input-form-profile" id="nombre_2" placeholder="Segundo nombre"
                value="<?php echo $data[0]['name_2'] ?>" disabled>
            <input type="text" name="pApellido" class="input-form-profile" id="apellido_1" placeholder="Primer apellido"
                value="<?php echo $data[0]['lastName_1'] ?>" disabled>
            <input type="text" name="sApellido" class="input-form-profile" id="apellido_2"
                placeholder="Segundo apellido" value="<?php echo $data[0]['lastName_2'] ?>" disabled>
            <input type="text" name="genero" class="input-form-profile" id="genero" placeholder="Género"
                value="<?php echo $data[0]['g'] ?>" disabled>
            <input type="list" name="tDocumento" class="input-form-profile" id="tDocumento" placeholder="Tipo documento"
                value="<?php echo $data[0]['td'] ?>" disabled>
            <input type="text" name="nDocumento" class="input-form-profile" id="documento" placeholder="Documento"
                value="<?php echo $data[0]['document'] ?>" disabled>
            <input type="hidden" name="documento" value="<?php echo $data[0]['document']; ?>"></input>
            <input type="text" name="correo" class="input-form-profile" id="correo" placeholder="Correo"
                value="<?php echo $data[0]['email']; ?>">
            <input type="text" name="nCelular" class="input-form-profile" id="celular" placeholder="Celular"
                value="<?php echo $data[0]['phoneNumber'] ?>">
            <input type="text" name="direccion" class="input-form-profile" id="direccion" placeholder="Dirección"
                value="<?php echo $data[0]['address'] ?>">
    </div>
    <div class="button-update-profile">
        <input type="submit" class="button-form-profile" name="update-user-profile" id="update-user" value="Actualizar Datos">
    </div>
</body>
<script src="../Js/admin.js"></script>
<script src="../Js/profile.js"></script>

</html>