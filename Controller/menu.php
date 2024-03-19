<?php 

class menu 
{
    function home_admin (){
        $data = consulta_usuario($_SESSION['employee']);
        $src_login = '../img/icono_salida.png';
        if($data[0]['image']!= null){
            $src = 'data:image/jpg;base64,'.base64_encode($data[0]['image']);
        }else {
            $src = "../img/default-profile.png";
        }
        return '
        <div class="menu" hidden>
            <a href="./profile.php" class="label label-info"><img src="'.$src.'" class="profile_image" alt="profile-image">'.$_SESSION['user'].' ('.$_SESSION['save_rol'].')</a>
            <a href="./users.php" class="label">Usuarios</a>
            <a href="./products.php" class="label">Productos</a>
            <a href="" class="label">prueba</a>
            <a href=""  class="label">prueba</a>
            <a href="../Controller/close_session.php" class="label label_border label_icon"><img src="'.$src_login.'" class="logos_menu" alt="imagen_salir">Salir</a>
        </div>';
    }

    function home_cajero (){
        $data = consulta_usuario($_SESSION['employee']);
        $src_login = '../img/icono_salida.png';
        if($data[0]['image']!= null){
            $src = 'data:image/jpg;base64,'.base64_encode($data[0]['image']);
        }else {
            $src = "../img/default-profile.png";
        }
        return '
        <div class="menu" hidden>
            <a href="" class="label label-info"><img src="'.$src.'" class="profile_image" alt="profile-image">'.$_SESSION['user'].' ('.$_SESSION['save_rol'].')</a>
            <a href="" class="label">prueba</a>
            <a href="" class="label">prueba</a>
            <a href="" class="label">prueba</a>
            <a href=""  class="label">prueba</a>
            <a href="../Controller/close_session.php" class="label label_border"><img src="'.$src_login.'" class="logos_menu" alt="imagen_salir">Salir</a>
        </div>';
    }

    function home_Mesero (){
        $data = consulta_usuario($_SESSION['employee']);
        $src_login = '../img/icono_salida.png';
        $src_login = '../img/icono_salida.png';
        if($data[0]['image']!= null){
            $src = 'data:image/jpg;base64,'.base64_encode($data[0]['image']);
        }else {
            $src = "../img/default-profile.png";
        }
        return '
        <div class="menu" hidden>
            <a href="./profile.php" class="label label-info"><img src="'.$src.'" class="profile_image" alt="profile-image">'.$_SESSION['user'].' ('.$_SESSION['save_rol'].')</a>
            <a href="./products.php" class="label">Productos</a>
            <a href="" class="label">prueba</a>
            <a href="" class="label">prueba</a>
            <a href=""  class="label">prueba</a>
            <a href="../Controller/close_session.php" class="label label_border"><img src="'.$src_login.'" class="logos_menu" alt="imagen_salir">Salir</a>
        </div>';
    }
}