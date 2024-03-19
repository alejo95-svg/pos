<?php
include '../Controller/connection.php';

if (isset($_POST['bUsuario']) && $_POST['bUsuario'] != '') {
    session_start();
    $usuario = $_POST['bUsuario'];
    $l1 = "SELECT name_1, name_2, lastName_1, lastName_2, rol.name, document, active, email FROM users Inner join rol on users.Id_rol = rol.Id_rol ";
    $l2 = " WHERE (name_1 LIKE '%$usuario%' OR name_2 LIKE '%$usuario%' OR lastName_1 LIKE '%$usuario%' OR lastName_2 LIKE '%$usuario%'";
    $l3 = " OR document LIKE '%$usuario%' OR email LIKE '%$usuario%' OR rol.name LIKE '%$usuario%') AND email <>'".$_SESSION['admin']."'";
    $buscar = $GLOBALS['conn']->query($l1.$l2.$l3);
    $vBuscar = mysqli_fetch_assoc($buscar);
    $rows = mysqli_num_rows($buscar);
    if ($rows) {
?>
<table>
        <tr class="title">
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Rol</th>
            <th>Estado</th>
        </tr>
<?php
        foreach ($buscar as $row) {
            $status = ($row['active'])? 'Activo' : 'Inactivo';
            echo '
                <tr>
                    <td>'.$row['name_1'].' '.$row['name_2'].'</td>
                    <td>'.$row['lastName_1'].' '.$row['lastName_2'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$status.'</td>
                </tr>
            ';
        }
    }
}
?>
</table>
