<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <title>tolitamal</title>
</head>

<body>
    <?php
    include '../Controller/includes.php';

    if (isset($_SESSION['flag'])) {
        msg();
        unset($_SESSION['flag'], $_SESSION['msg']);
        echo '<script>setTimeout("document.location.reload()",2000);</script>';
    }
    ?>
    <h3 class='title-form'>Agregar Usuario</h3>
    <div class="container-form form-add-user">
        <form action="../Controller/variables.php" class='form_add' method="POST" enctype="multipart/form-data">
            <input type="text" name="pNombre" class="input-form" id="nombre_1" placeholder="Primer nombre">
            <input type="text" name="sNombre" class="input-form" id="nombre_2" placeholder="Segundo nombre" disabled>
            <input type="text" name="pApellido" class="input-form" id="apellido_1" placeholder="Primer apellido"
                disabled>
            <input type="text" name="sApellido" class="input-form" id="apellido_2" placeholder="Segundo apellido"
                disabled>
            <select list="genero" type="text" name="genero" class="input-form select" id="genero" placeholder="Género"
                disabled>
                <datalist id="genero">
                    <option value="genero">Género</option>
                    <?php
                    $genero = genero();
                    foreach ($genero as $genero) {
                        echo '
                    <option value="' . $genero['Id_genre'] . '">' . $genero['name'] . '</option>';
                    }
                    ?>
                </datalist>
            </select>
            <select list="tipo_documento" type="list" name="tDocumento" class="input-form select" id="tDocumento"
                placeholder="Tipo documento" disabled>
                <datalist id="tipo_documento">
                    <option value="tipo_documento">Tipo documento</option>
                    <?php
                    $tDocumento = tipoDocumento();
                    foreach ($tDocumento as $tDocumento) {
                        echo '
                    <option value="' . $tDocumento['Id_documentType'] . '">' . $tDocumento['name'] . '</option>';
                    }
                    ?>
                </datalist>
            </select>
            <input type="text" name="nDocumento" class="input-form" id="nDocumento" placeholder="Número de documento"
                disabled>
            <input type="text" name="correo" class="input-form" id="correo" placeholder="Correo" disabled>
            <input type="text" name="nCelular" class="input-form" id="celular" placeholder="Número de celular" disabled>
            <input type="text" name="direccion" class="input-form" id="direccion" placeholder="Dirección" disabled>
            <select list="Rol" type="text" name="rol" class="input-form select" id="rol" placeholder="Rol" disabled>
                <datalist id="Rol" disabled>
                    <option value="rol">Rol</option>
                    <?php
                    $roles = roles();
                    foreach ($roles as $rol) {
                        echo '
                    <option value="' . $rol['Id_rol'] . '">' . $rol['name'] . '</option>';
                    }
                    ?>
                </datalist>
            </select>
            <label for="archivo" class="input-form text-uploadImage">Selecciona una Imagen</label>
            <input type="file" class="upload_image" id="archivo" name="image" disabled>

            <div>
                <input type="submit" class='disabled-button-form' name="submit_add_user" id="submit_form" disabled>
            </div> 
        </form>
    </div>
</body>
<script src="../Js/admin.js"></script>
<script src="../Js/add_user.js"></script>

</html>