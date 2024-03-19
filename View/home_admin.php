<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Tolitamal</title>
</head>

<body onload="fechaActual()" class="move">
    <?php 
   /*  include('../Controller/connection.php'); */
    require ('../Controller/connection.php');
    include '../Model/consulta.php';
    include('./navbar.php');
    $uOnline = uOnline();
    ?>
    <div class="reloj"></div>
    <h3>Usuarios activos</h3>
    <table class="active onlineUser">
        <tr class= "title">        
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rol</th>
            <th>Hora conexión</th>
        </tr>
        <?php 
        /* for($i = 0 ; $i < $uOnline[1]; $i++){ */ 
        /* while($row = mysqli_fetch_assoc($uOnline[1])){ */
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
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../Js/admin.js"></script>
<script src="../Js/reloj.js"></script>
</html>