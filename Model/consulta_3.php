<?php
include '../Controller/connection.php';

if (isset($_POST['bUsuario']) && $_POST['bUsuario'] != '') {
    session_start();
    $cont = 0;
    $_SESSION['datos'] = array();
    $usuario = $_POST['bUsuario'];
    $l1 = "SELECT name_1, name_2, lastName_1, lastName_2, rol.name, document, email FROM users Inner join rol on users.Id_rol = rol.Id_rol ";
    $l2 = " WHERE (name_1 LIKE '%$usuario%' OR name_2 LIKE '%$usuario%' OR lastName_1 LIKE '%$usuario%' OR lastName_2 LIKE '%$usuario%'";
    $l3 = " OR document LIKE '%$usuario%' OR email LIKE '%$usuario%') AND active = 1 AND email <>'".$_SESSION['admin']."'";
    $buscar = $GLOBALS['conn']->query($l1.$l2.$l3);
    $vBuscar = mysqli_fetch_assoc($buscar);
    $rows = mysqli_num_rows($buscar);
    if ($rows) {
?>
<table>
        <tr class="title">
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Documento</th>
            <th>Borrar</th>
        </tr>   
<?php
        foreach ($buscar as $row) {
            $cont += 1;
            $_SESSION['datos'][$cont - 1] = $row; 
            echo '
                <tr>
                    <td>'.$row['name_1'].' '.$row['name_2'].'</td>
                    <td>'.$row['lastName_1'].' '.$row['lastName_2'].'</td>
                    <td>'.$row['document'].'</td>
                    <td>
                        <div class="button-delete">
                        <form action="../Controller/variables.php" method="POST">
                            <div class="img-delete">
                                <i class="fa-solid fa-trash"></i>
                                <input type="hidden" name="usuario" value="'.($cont - 1).'">
                                <input type="submit" name="borrarU" class="delete-user" id="borrarU" value="Borrar">
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