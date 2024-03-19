<?php
require '../Controller/connection.php';
date_default_timezone_set('America/Bogota');
function crearUsuario ($n1, $n2, $a1, $a2, $g, $td, $nd, $c, $nc, $dir, $img, $rol) {
    $activo = 1;
    $pwd = random_pwd($c);
    $data = consulta_usuario($c); /* verificar si el documento ya existe */
    $l1 = "INSERT INTO users (name_1, name_2, lastName_1, lastName_2, Id_genre, Id_documentType, document, email, pwd, phoneNumber, address, image, Id_rol, active)"; 
    $l2 = " VALUES ('".$n1."', '".$n2."', '".$a1."', '".$a2."', ".$g.", ".$td.", '".$nd."', '".$c."', '".$pwd."', '".$nc."', '".$dir."', '".$img."' ,".$rol.", ".$activo.")";
    if($data[1]){
        if($data[0]['active'] == 0){
            cambiarEstado($data[0]['document'], 1);
            $msg =['Usuario activado', true];
        }else{
            $msg =['El usuario ya existe', false];
        }
        
    }else {
        $consulta = $GLOBALS['conn']->query($l1 . $l2);
        $msg = ['Usuario creado exitosamente', true];
    }
    return $msg;
}

function actualizarUsuario ($n1, $n2, $a1, $a2, $g, $td, $nd, $c, $nc, $dir, $rol, $activo) {/* verificar where */
    $l1 = "UPDATE users SET name_1 = '".$n1."', name_2 = '".$n2."', lastName_1 = '".$a1."', lastName_2 = '".$a2."', Id_genre = ".$g.","; 
    $l2 = " Id_documentType = ".$td.", document = '".$nd."', email = '".$c."', phoneNumber = '".$nc."', address = '".$dir."', Id_rol = ".$rol.", active = ".$activo." WHERE document = '".$nd."'";
    $consulta = $GLOBALS['conn']->query($l1.$l2);
    $msg =['Usuario actualizado', true];
    return $msg;
}

function actualizarPerfil ($c, $nc, $dir, $nd) {
    $l1 = "UPDATE users SET email = '".$c."', phoneNumber = '".$nc."', address = '".$dir."'";
    $l2 = " WHERE document = '".$nd."'";
    $consulta = $GLOBALS['conn']->query($l1.$l2);
    $msg =['Datos actualizados', true];
    return $msg;
}

function actualizarFotoPerfil ($img, $email) {
    $l1 = "UPDATE users SET image = '".$img."' WHERE email = '".$email."'";
    $consulta = $GLOBALS['conn']->query($l1);
    $msg =['Foto actualizada', true];
    return $msg;
}

function cambiarEstado ($document, $status = 0) {/* revisar */
    $l1 = "UPDATE users SET active = ".$status." where document ='".$document."'";
    $consulta = $GLOBALS['conn']->query($l1);
    $msg =['Usuario borrado', true];
    return $msg;
} 

function random_pwd($email){
    $rPwd = '';
    $patron = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*-';
    for($i=0; $i<8; $i++) {
        $rPwd .= substr($patron, mt_rand(0,strlen($patron)), 1);
    }
    /* $rPwd; enviar contrasenia al correo*/
    $ePwd = password_hash('Tolitamal2024', PASSWORD_DEFAULT, ['cost' => 10]);
    return $ePwd;
}

function consulta_usuario ($email){
    $l1 = "SELECT Id_user, name_1, name_2, lastName_1, lastName_2, email, pwd, rol.Id_rol, rol.name AS rol,";
    $l2 = " documenttype.Id_documenttype, documenttype.name AS td, document, active, genre.Id_genre, genre.name AS g, phoneNumber,";
    $l3 = " address, image FROM users Inner join rol on users.Id_rol = rol.Id_rol Inner join genre on users.Id_genre = genre.Id_genre";
    $l4 = " Inner join documenttype on users.Id_documenttype = documenttype.Id_documenttype where email ='" . $email ."'";
    /* $l5 = " OR document ='".$document."'"; */
    $consulta = $GLOBALS['conn']->query($l1.$l2.$l3.$l4);
    $validar = $consulta->fetch_array(MYSQLI_ASSOC);
    $datos = [$validar, mysqli_num_rows($consulta)];
    return $datos;
}

function uOnline ($email = '') {
    $online = $GLOBALS['conn']->query("SELECT Id_user, nombre, apellido, email, rol, hora_conexion FROM online WHERE email LIKE '%$email%'");
    $vOnline = mysqli_fetch_assoc($online);/* $online->fetch_array(MYSQLI_ASSOC) */;
    $rows = mysqli_num_rows($online);
    $datos = [$vOnline, $online, $rows];
 /*    var_dump($datos[0]); */
    return $datos;
}

function insertar ($datos, $hora) {
    $l1 ="INSERT INTO online (Id_user, nombre, apellido, email, rol, hora_conexion)"; 
    $l2 = "VALUES ('".$datos[0]['Id_user']."', '".$datos[0]['name_1']."', '".$datos[0]['lastName_1']."', '".$datos[0]['email']."', '".$datos[0]['rol']."', '".$hora."')";
    $GLOBALS['conn']->query ($l1 . $l2);
}

function roles () {
    $online = $GLOBALS['conn']->query("SELECT * FROM rol where name!= 'root'");
    return $online;
}

function genero () {
    $online = $GLOBALS['conn']->query("SELECT * FROM genre");
    return $online;
}

function tipoDocumento () {
    $online = $GLOBALS['conn']->query("SELECT * FROM documenttype");
    return $online;
}

function tamanioProducto () {
    $size = $GLOBALS['conn']->query("SELECT * FROM size");
    return $size;
}

function tipoProducto () {
    $type = $GLOBALS['conn']->query("SELECT * FROM type");
    return $type;
}

function company () {
    $company = $GLOBALS['conn']->query("SELECT * FROM companyname");
    return $company;
}

function consulta_producto ($bc, $type = '', $name = ''){
    $l1 = "SELECT Id_product, product.name, product.Id_size, product.Id_type, type.name As type, price, product.Id_companyName, barCode";
    $l1 .= " FROM product";
    $l1 .= " Inner join size on product.Id_size = size.Id_size";
    $l1 .= " Inner join type on product.Id_type = type.Id_type";
    $l1 .= " Inner join companyname on product.Id_companyName = companyname.Id_companyName";
    $l1 .= " WHERE barCode ='" . $bc ."' OR  type.name ='" . $type ."' OR  product.name ='" . $name ."'";
    if($type != 'tamal'){
        $l2 = " ORDER BY product.name DESC";
        $consulta = $GLOBALS['conn']->query($l1.$l2);
    }else{
        $consulta = $GLOBALS['conn']->query($l1);
    }
    
    $validar = $consulta->fetch_array(MYSQLI_ASSOC);
    $datos = [$validar, mysqli_num_rows($consulta), $consulta];
    return $datos;
}

function crearProducto ($n, $s, $t, $p, $c, $bc) {
    $data = consulta_producto($bc);
    $l1 = "INSERT INTO product (name, Id_size, Id_type, price, Id_companyName, barCode)"; 
    $l2 = " VALUES ('".$n."', ".$s.", ".$t.", ".$p.", ".$c.", ".$bc.")";
    if($data[1]){
        $msg = ['Producto existe', true];
    }else {
        $consulta = $GLOBALS['conn']->query($l1.$l2);
        $msg = ['Producto creado exitosamente', true];
    }
    return $msg;
}

function actualizarProducto ($n, $s, $t, $p, $c, $bc, $rbc) {
    $l1 = "UPDATE product set name = '".$n."', Id_size = ".$s.", Id_type = ".$t.", price = ".$p.", Id_companyName = ".$c.", barCode = ".$bc; 
    $l2 = " WHERE barCode = ".$rbc;
    $consulta = $GLOBALS['conn']->query($l1.$l2);
    $msg = ['Producto Actualizado', true];
    
    return $msg;
}

function borrarProducto ($bc) {
    $l1 = "DELETE FROM product"; 
    $l2 = " WHERE barCode = ".$bc;
    $consulta = $GLOBALS['conn']->query($l1.$l2);
    $msg = ['Producto Borrado', true];
    
    return $msg;
}

function mesas (){
    $mesa = $GLOBALS['conn']->query("SELECT * FROM mesa");
    return $mesa;
}

function consultaMesa ($m){
    $consulta = $GLOBALS['conn']->query("SELECT * FROM mesa WHERE Id_mesa = ".$m);
    $mesa = $consulta->fetch_array(MYSQLI_ASSOC);
    return $mesa;
}

function consultaBebidas ($t){
    $l1 = "SELECT Id_product, product.name as name, product.Id_size, product.Id_type, type.name As type, price, product.Id_companyName, barCode";
    $l1 .= " FROM product";
    $l1 .= " Inner join size on product.Id_size = size.Id_size";
    $l1 .= " Inner join type on product.Id_type = type.Id_type";
    $l1 .= " Inner join companyname on product.Id_companyName = companyname.Id_companyName";
    $l1 .= " where type.name ='" . $t ."'";
    $l1 .= " ORDER BY product.name DESC";
    $consulta = $GLOBALS['conn']->query($l1);
    
    $validar = $consulta->fetch_array(MYSQLI_ASSOC);
    $datos = [$validar, mysqli_num_rows($consulta), $consulta];
    return $datos;
}
/* print_r (consultaBebidas ('jugo')[0]); */

function agregarProductos($cant, $id, $mesa){
    $status = 1;
    $fecha = date('Y-m-d H:i:s');
    echo $fecha;
    for($i=0;$i<count($cant);$i++){
        $l1 = "INSERT INTO contenidoMesa";
        $l2 = " (Id_product, cantidad, Id_mesa, fecha, status)";
        $l3 = " VALUES ($id[$i], $cant[$i], $mesa, '".$fecha."', $status)";
        $consulta = $GLOBALS['conn']->query($l1.$l2.$l3);
    }
    $msg = ['Productos Agregados', true];
    
    return $msg;
}
