<?php
include '../Controller/connection.php';

if (isset($_POST['bUsuario']) && $_POST['bUsuario'] != '') {
    session_start();
    $cont = 0;
    $_SESSION['datos'] = array();
    $usuario = $_POST['bUsuario'];
    $l1 = "SELECT name_1, name_2, lastName_1, lastName_2, rol.name, document, email, active FROM users Inner join rol on users.Id_rol = rol.Id_rol ";
    $l2 = " WHERE (name_1 LIKE '%$usuario%' OR name_2 LIKE '%$usuario%' OR lastName_1 LIKE '%$usuario%' OR lastName_2 LIKE '%$usuario%'";
    $l3 = " OR document LIKE '%$usuario%' OR email LIKE '%$usuario%') AND email<>'".$_SESSION['admin']."'";
    $buscar = $GLOBALS['conn']->query($l1.$l2.$l3);
    $vBuscar = mysqli_fetch_assoc($buscar);
    $rows = mysqli_num_rows($buscar);
    if ($rows) {
?>
<table class='tabla-index'>
        <tr class="title">
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Estado</th>
            <th>Modifcar</th>
        </tr>   
<?php
        foreach ($buscar as $row) {
            $cont += 1;
            $_SESSION['datos'][$cont - 1] = $row; 
            $status = ($row['active'])? 'Activo' : 'Inactivo';
            echo '
                <tr>
                    <td>'.$row['name_1'].' '.$row['name_2'].'</td>
                    <td>'.$row['lastName_1'].' '.$row['lastName_2'].'</td>
                    <td>'.$status.'</td>
                    <td>
                        <div class="button-update">
                        <form action="../View/update_user.php" method="POST">
                            <div>
                                <input type="hidden" name="usuario" value="'.($cont - 1).'">
                                <button type="submit" name="updateU" class="update-user" id="updateU"><i class="fa-solid fa-pen-to-square"></i></button>
                            </div>
                        </form>
                        </div>
                    </td>
                </tr>
            ';
        }
    }
}

?>
</table>