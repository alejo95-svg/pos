<table class="active onlineUser">
        <tr class= "title">        
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rol</th>
            <th>Hora conexión</th>
        </tr>
<?php 
        require ('../Controller/connection.php');
        include '../Model/consulta.php';
        $uOnline = uOnline();
            foreach($uOnline[1] as $row){ 
        echo '
        <tr>
            <td>'.$row['nombre'].'</td>
            <td>'.$row['apellido'].'</td>
            <td>'.$row['rol'].'</td>
            <td>'.$row['hora_conexion'].'</td>
        </tr>';
        }
?>
</table>
