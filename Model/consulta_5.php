<?php
include '../Controller/connection.php';

if (isset($_POST['bProduct']) && $_POST['bProduct'] != '') {
    session_start();
    $producto = $_POST['bProduct'];
    $l1 = "SELECT product.name, size.name As size, type.name As type, price, barCode";
    $l2 = " FROM product";
    $l3 = " Inner join size on product.Id_size = size.Id_size";
    $l4 = " Inner join type on product.Id_type = type.Id_type";
    $l5 = " WHERE (product.name LIKE '%$producto%' OR size.name LIKE '%$producto%' OR type.name LIKE '%$producto%' OR price LIKE '%$producto%' OR barCode LIKE '%$producto%')";
    $buscar = $GLOBALS['conn']->query($l1.$l2.$l3.$l4.$l5);
    $vBuscar = mysqli_fetch_assoc($buscar);
    $rows = mysqli_num_rows($buscar);
    if ($rows) {
?>
<table class="table-result">
        <tr class="title">
            <th>Nombre</th>
            <th>Tamaño</th>
            <th>Tipo</th>
            <th>Precio</th>
        </tr>
<?php
        foreach ($buscar as $row) {
            echo '
                <tr>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['size'].'</td>
                    <td>'.$row['type'].'</td>
                    <td>'.$row['price'].'</td>
                </tr>
            ';
        }
    }
}
?>
</table>
