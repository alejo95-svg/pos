<?php
include 'validation_rol.php';
include 'funciones.php';
session_start();


if (isset($_POST['submit_login'])) {
    $email = $_POST['correo'];
    $pwd = $_POST['pwd'];
    $rol = set_rol();
    $session = new rol($email, $pwd, $rol);
    $session->credentials();
}

if(isset($_POST['submit_add_user'])){
    $n1 = $_POST['pNombre'];
    $n2 = $_POST['sNombre'];
    $a1 = $_POST['pApellido'];
    $a2 = $_POST['sApellido'];
    $g = $_POST['genero'];
    $td =  $_POST['tDocumento'];
    $nd = $_POST['nDocumento'];
    $c = $_POST['correo'];
    $nc = $_POST['nCelular'];
    $dir = $_POST['direccion'];
    $rol = $_POST['rol'];
    $img = ($_FILES['image']['tmp_name']!= '')? addslashes(file_get_contents($_FILES['image']['tmp_name'])) : '';
    $user = new create($n1, $n2, $a1, $a2, $g, $td, $nd, $c, $nc, $dir, $img, $rol);
    $data = $user->createUser();
    flag($data);
    header("location: ../View/add_user.php") ;
}

if(isset($_POST['update-user-profile'])){
    $nd = $_POST['documento'];
    $c = $_POST['correo'];
    $_SESSION['employee'] = $c; /* para que los datos no se pierdan al actualizar */
    $_SESSION['save_rol'] == 'Administrador'? $_SESSION['admin'] = $c : '';
    $_SESSION['employee'] = $c;
    $nc = $_POST['nCelular'];
    $dir = $_POST['direccion'];
    $user = new update($c, $nc, $dir, $nd);
    $data = $user->updateProfile();
    flag($data);
    header("location: ../View/profile.php");
}

if(isset($_POST['nFoto'])){
    $img = ($_FILES['image']['tmp_name']!= '')? addslashes(file_get_contents($_FILES['image']['tmp_name'])) : '';
    $foto_usuario = new update($img, $_SESSION['employee']);
    $data = $foto_usuario->updateProfileImage();
    flag($data);
    header("location: ../View/profile.php");
}

if(isset($_POST['borrarU'])){
    $usuario = $_POST['usuario'];
    $documento = new delete($_SESSION['datos'][$usuario]['document']);
    $data = $documento->delete_user();
    flag($data);
    header("location: ../View/delete_user.php");
}

if(isset($_POST['update-user'])){
    $n1 = $_POST['pNombre'];
    $n2 = $_POST['sNombre'];
    $a1 = $_POST['pApellido'];
    $a2 = $_POST['sApellido'];
    $g = $_POST['genero'];
    $td = $_POST['tDocumento'];
    $nd = $_POST['nDocumento'];
    $c = $_POST['correo'];
    $nc = $_POST['nCelular'];
    $dir = $_POST['direccion'];
    $rol = $_POST['rol'];
    $activo = $_POST['activo'];

    $usuario = new update($n1, $n2, $a1, $a2, $g, $td, $nd, $c, $nc, $dir, $rol, $activo);
    $data = $usuario->actualizarUsuario();
    flag($data);
    header("location: ../View/update_user.php");
}

if(isset($_POST['submit_add_product'])){
    $nombre = $_POST['nombre'];
    $tamanio = $_POST['tamanio'];
    $tProducto = $_POST['tProducto'];
    $precio = $_POST['precio'];
    $codigo = $_POST['codigo'];
    $company = $_POST['company'];

    $producto = new create($nombre, $tamanio, $tProducto, $precio, $company, $codigo);
    $data = $producto->createProduct();
    flag($data); 
    header("location: ../View/add_product.php");
}

if(isset($_POST['update-product'])){
    $nombre = $_POST['nombre'];
    $tamanio = $_POST['tamanio'];
    $tProducto = $_POST['tProduct'];
    $precio = $_POST['precio'];
    $company = $_POST['company'];
    $codigo = $_POST['codigo'];
    $rBarCode = $_POST['barCode'];

    $producto = new update($nombre, $tamanio, $tProducto, $precio, $company, $codigo, $rBarCode);
    $data = $producto->updateProduct();
    flag($data); 
    header("location: ../View/update_product.php");
}

if(isset($_POST['borrarP'])){
    $producto = $_POST['producto'];
    $documento = new delete($_SESSION['datos'][$producto]['barCode']);
    $data = $documento->delete_product();
    flag($data);
    header("location: ../View/delete_product.php");
}

if(isset($_POST['table'])){
    $_SESSION['numeroMesa'] = $_POST['mesa'];
    $_SESSION['oculto_botones'] = 'hidden';
    $_SESSION['oculto_tamales'] = 'hidden';
    $_SESSION['oculto_bebidas'] =  'hidden';
    $_SESSION['oculto'] = '';
    /* $_SESSION['oculto_jugos'] =''; */
    $_SESSION['tamal_flag'] = false;
    $_SESSION['jugos_flag'] = false;
    header("location: ../View/cuenta_mesa.php");
}

if(isset($_POST['add-product-table'])){
    $_SESSION['oculto'] = 'hidden';
    $_SESSION['oculto_botones'] = '';
    header("location: ../View/cuenta_mesa.php");
}

if(isset($_POST['tamales'])){

    $_SESSION['oculto_botones'] = "hidden";
    $_SESSION['oculto'] = "hidden";
    $_SESSION['oculto_tamales'] = '';
    $_SESSION['tamal_flag'] = true;

    header("location: ../View/cuenta_mesa.php");
}

if(isset($_POST['bebidas'])){
    $cont = 0;
    $j = 0;
    $_SESSION['oculto_botones'] = "hidden";
    $_SESSION['oculto'] = "hidden";
    $_SESSION['oculto_tamales'] = 'hidden';
    $_SESSION['oculto_bebidas'] =  '';
    $_SESSION['tamal_flag'] = false;
    $type = ['Jugo', 'Gaseosa', 'Bebida Caliente', 'Bebida Fria'];

    
/*     for($i = 0; $i <=3; $i++){
        if(consulta_producto ('', $type[$i])[1]){
            $bebidas[$j] = consulta_producto ('', $type[$i])[0];
            foreach($bebidas as $bebidas){
                $_SESSION['bebidas'][$i] = $bebidas; 
            }
            $j++;
        } */

        /* echo $i.'/////////////////////////////////////'; */
    /* } */
    /* print_r($_SESSION['bebidas']); */
/*     for($i = 0; $i <count($_SESSION['bebidas']); $i++){
        print_r($_SESSION['bebidas'][$i]);
        echo '<br>';
    } */
    header("location: ../View/cuenta_mesa.php");
}

if(isset($_POST['jugos'])){
    $_SESSION['oculto_bebidas'] = 'hidden';
    $_SESSION['jugos_flag'] = true;
    header("location: ../View/cuenta_mesa.php");

}

if(isset($_POST['agregar-cantidades-tamal'])){
    $mesa = $_POST['mesa'];
    $j = 0;
    for($i=0; $i<count($_POST)- 6; $i++){
        if($_POST[$_SESSION['tamales'][$i]['name']] != 0){
            $cantidades[$j] = $_POST[$_SESSION['tamales'][$i]['name']];
            $id[$j] = $_POST['id_'.$i];
            $j++;
        }
    }
    $agregarMesa = new mesa($cantidades, $id, $mesa);
    $data = $agregarMesa->addTamales();
    $_SESSION['oculto_botones'] = "hidden";
    $_SESSION['oculto'] = "";
    $_SESSION['oculto_tamales'] = "hidden";
    $_SESSION['tamal_flag'] = false;
    flag($data);
    header("location: ../View/cuenta_mesa.php");
}




