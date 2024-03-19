<?php
/* error_reporting(0); */
if (!isset($_SESSION)) {
    session_start();
  }

/* if(!isset($_SESSION['admin'])){
    header('location: ./View/forbidden.php');
} */
if($_SERVER['REQUEST_URI'] != '/pos/index.php'){
    echo '<noscript><META HTTP-EQUIV="Refresh" CONTENT="0;URL=./forbidden.php"></noscript>';
}else {
    echo '<noscript><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../pos/View/forbidden.php"></noscript>';
}


if(!isset($_SESSION['admin']) && $_SERVER['REQUEST_URI'] != '/pos/index.php' && $_SERVER['REQUEST_URI'] != '/pos/View/login.php'){
        header('location: ../index.php');
}
    /* if ($_SERVER['REQUEST_URI'] == '' || $_SERVER['REQUEST_URI'] == '/index.php') { */
    if ($_SERVER['REQUEST_URI'] == '/pos/' || $_SERVER['REQUEST_URI'] == '/pos/index.php') {
        /* include ('./Controller/connection.php'); */
        $logo_class = 'head_std';
        $link = './index.php';
        $src = './img/logo.png"';
        $src_login = '';
        $show = 'hidden';
        /* else if ($_SERVER['REQUEST_URI'] == '/View/login.php') { */
    } else if ($_SERVER['REQUEST_URI'] == '/pos/View/login.php') {
        /* include ('../Controller/connection.php'); */
        $logo_class = 'head_std';
        $link = '../Controller/close_session.php';
        $src = '../img/logo.png"';
        $src_login  = '';
        $show = 'hidden';
    } else {
        $logo_class = 'head_login';
        $src = '../img/logo.png"';
        $src_login = '../img/icono_salida.png';
        $show = '';/* aca se controla la vista segun el tipo de usuario */
        switch($_SESSION['save_rol']){
            case 'Administrador':
                $link = './home_admin.php';
                break;
            case 'Cajero':
                $link = './home_cajero.php';
                break;
            case 'Mesero':
                $link = './home_mesero.php';
                break;
        }

    }
    
?>
<div class="logo">
    <header <?php echo "class='" . $logo_class . "'"; ?>>
        <a <?php echo 'href="' . $link . '"'; ?>><img <?php echo 'src="' . $src . '"' ?> alt="logo_tolitamal"
                class="logo_empresa"></a>
    </header>
    <div class="hamburger_position" <?php echo $show; ?>>
        <label class="hamburger">
            <input type="checkbox" class="hamburger_menu">
            <svg viewBox="0 0 32 32">
                <path class="line line-top-bottom"
                    d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
                </path>
                <path class="line" d="M7 16 27 16"></path>
            </svg>
        </label>
    <?php
     
    if(isset($_SESSION['admin']) && $_SERVER['REQUEST_URI'] != '/pos/View/login.php'){
        include '../Controller/menu.php';
        if($_SESSION['save_rol'] == 'Administrador'){
            $uOnline = uOnline($_SESSION['admin']);/* se debe agregar el include en las paginas respectivas */
            $menu_admin = new menu();
            echo $menu_admin->home_admin();
        }else{
            $uOnline = uOnline($_SESSION['employee']);/* se debe agregar el include en las paginas respectivas */
            if($uOnline[0]['rol'] == 'Cajero'){
                $menu_cajero = new menu();
                echo $menu_cajero->home_Cajero();
            }else {
                $menu_mesero = new menu();
                echo $menu_mesero->home_Mesero();
            }
        }
         



    }
    ?>
    </div>
</div>

<?php 

    echo '
    <div class="card-timer" hidden>
        <div class="timer"></div>
    </div>';

    if(isset($_SESSION['timer'])){
        echo '<script src="../Js/menu.js"></script>';
    }
?>