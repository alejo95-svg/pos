<?php
session_start();
echo 'rol: '.$_SESSION['save_rol'].'<br>';
echo 'Admin: '.$_SESSION['admin'].'<br>';
echo 'Rol: '.$_SESSION['rol'].'<br>';
echo 'employee: '.$_SESSION['employee'].'<br>';
echo 'flag: '.$_SESSION['flag'].'<br>';
echo 'msg: '.$_SESSION['msg'].'<br>';
echo 'mesa: ';
echo ($_SESSION['numeroMesa']);

