<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/cd8ffc90f9.js" crossorigin="anonymous"></script>
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
    <h3 class='title-form' id="title">Actualizar datos Usuario</h3>
    <div class="container-form-2 form-add-user">
        <form action="" method="POST">
            <input type="text" name="bUsuario" class="input-form" id="bUsuario" placeholder="Buscar Usuario">
        </form>
        <div id='rBusqueda'></div>
        <?php 
            if(isset($_POST['updateU'])){
                echo '<script>
                title.setAttribute("hidden", true);
                bUsuario.type ="hidden";
                </script>';
                $usuario = $_POST['usuario'];
                $dUsuario = consulta_usuario($_SESSION['datos'][$usuario]['email']);
                
                echo '
                <div class="container-form form-add-user">
                <form action="../Controller/variables.php" class="form_add" method="POST">
                    <input type="text" name="pNombre" class="input-form" id="nombre_1" placeholder="Primer nombre" value="'.$dUsuario[0]['name_1'].'">
                    <input type="text" name="sNombre" class="input-form" id="nombre_2" placeholder="Segundo nombre" value="'.$dUsuario[0]['name_2'].'">
                    <input type="text" name="pApellido" class="input-form" id="apellido_1" placeholder="Primer apellido" value="'.$dUsuario[0]['lastName_1'].'">
                    <input type="text" name="sApellido" class="input-form" id="apellido_2" placeholder="Segundo apellido" value="'.$dUsuario[0]['lastName_2'].'">
                    <select list="genero" type="text" name="genero" class="input-form" id="genero" placeholder="Género">
                    <datalist id="genero">';
                        $genero = genero();
                        foreach ($genero as $genero){
                           echo '<option value="'.$genero['Id_genre'].'">'.$genero['name'].'</option>';
                        }
                    echo '<script>genero.value = '.$dUsuario[0]['Id_genre'].';</script>';
                    echo'
                    </datalist>
                    </select>
                    <select list="tipo_documento" type="list" name="tDocumento" class="input-form" id="tDocumento" placeholder="Tipo documento">
                    <datalist id="tipo_documento">';
                        $tDocumento = tipoDocumento();
                        foreach ($tDocumento as $tDocumento){
                            echo '
                            <option value="'.$tDocumento['Id_documentType'].'">'.$tDocumento['name'].'</option>';
                        }
                    echo '<script>tDocumento.value = '.$dUsuario[0]['Id_documenttype'].';</script>';
                    echo'
                    </datalist>
                    </select>
                    <input type="text" name="nDocumento" class="input-form" id="documento" placeholder="Documento" value="'.$dUsuario[0]['document'].'">
                    <input type="text" name="correo" class="input-form" id="correo" placeholder="Correo" value="'.$dUsuario[0]['email'].'">
                    <input type="text" name="nCelular" class="input-form" id="celular" placeholder="Celular" value="'.$dUsuario[0]['phoneNumber'].'">
                    <input type="text" name="direccion" class="input-form" id="direccion" placeholder="Dirección" value="'.$dUsuario[0]['address'].'">
                    <select list="Rol" type="text" name="rol" class="input-form" id="rol" placeholder="Rol">
                    <datalist id="Rol" disabled>';
                        $roles = roles();   
                        foreach ($roles as $rol){
                            echo '
                            <option value="'.$rol['Id_rol'].'">'.$rol['name'].'</option>';
                        }
                    echo '<script>rol.value = '.$dUsuario[0]['Id_rol'].';</script>';
                    echo '
                    </datalist>
                    </select>

                    <select list="activo" type="text" name="activo" class="input-form" id="activo" placeholder="activo">
                    <datalist id="Rol" disabled>';
                            $Id_estado = ($dUsuario[0]['active'])? 1 : 0;
                            echo $Id_estado;
                            echo '
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>';
                    echo '<script>activo.value = '.$Id_estado.';</script>';
                    echo '
                    </datalist>
                    </select>
                    <div>
                        <input type="submit" class="disabled-button-form" name="update-user" id="update-user" value="Actualizar" >
                    </div>
                ';
            }
        ?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../Js/admin.js"></script>
<script src="../Js/update_user.js"></script>
</html>