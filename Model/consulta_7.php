<?php
include '../Controller/connection.php';

if (isset($_POST['bProduct']) && $_POST['bProduct'] != '') {
    session_start();
    $cont = 0;
    $_SESSION['datos'] = array();
    $producto = $_POST['bProduct'];
    $l1 = "SELECT product.name As name, size.name As size, type.name As type, price, barCode";
    $l2 = " FROM product";
    $l3 = " Inner join size on product.Id_size = size.Id_size";
    $l4 = " Inner join type on product.Id_type = type.Id_type";/* agregar company  */
    $l5 = " WHERE (product.name LIKE '%$producto%' OR size.name LIKE '%$producto%' OR type.name LIKE '%$producto%' OR price LIKE '%$producto%' OR barCode LIKE '%$producto%')";
    $buscar = $GLOBALS['conn']->query($l1.$l2.$l3.$l4.$l5);
    $vBuscar = mysqli_fetch_assoc($buscar);
    $rows = mysqli_num_rows($buscar);
    if ($rows) {
?>
<table class='tabla-index'>
        <tr class="title">
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Borrar</th>
        </tr>   
<?php
        foreach ($buscar as $row) {
            $cont += 1;
            $_SESSION['datos'][$cont - 1] = $row; 
            $size = $row['size'] == "Estandar" ? '' : $row['size'];
            echo '
                <tr>
                    <td>'.$row['name'].' '.$size.'</td>
                    <td>'.$row['type'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>
                    <div class="button-delete">
                        <form action="../Controller/variables.php" method="POST">
                            <div class="img-delete">
                                <i class="fa-solid fa-trash"></i>
                                <input type="hidden" name="producto" value="'.($cont - 1).'">
                                <input type="submit" name="borrarP" class="delete-user" id="borrarP" value="Borrar">
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