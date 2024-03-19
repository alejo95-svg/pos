<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <title>tolitamal</title>
</head>
<body>
    <?php 
    include '../Controller/includes.php';

    if (isset($_SESSION['flag'])) {
        msg();
        unset($_SESSION['flag'], $_SESSION['msg']);
        echo '<script>setTimeout("document.location.reload()",2000);</script>';
    }
    $size = tamanioProducto();
    $tProducto = tipoProducto();
    $company = company(); 
    ?>
    <h3 class='title-form'>Agregar Producto</h3><!-- realizar validaciones en js para este form -->
    <div class="container-form form-add-user">
        <form action="../Controller/variables.php" class='form_add' method="POST">
            <input type="text" name="nombre" class="input-form" id="nombre_1" placeholder="Nombre">
            <select list="tamanio" type="text" name="tamanio" class="input-form" id="tamanio">
            <datalist id="tamanio">
                <option value="tamanio">Tamaño</option>
                <?php 
                foreach ($size as $size){
                    echo '
                    <option value="'.$size['Id_size'].'">'.$size['name'].'</option>';
                }
                ?>
            </datalist>
            </select>
            <select list="tipoProducto" type="list" name="tProducto" class="input-form" id="tProducto">
            <datalist id="tipoProducto">
                <option value="tipoProducto">Tipo de Producto</option>
                <?php 
                foreach ($tProducto as $tProducto){
                    echo '
                    <option value="'.$tProducto['Id_type'].'">'.$tProducto['name'].'</option>';
                }
                ?>
            </datalist>
            </select>
            <input type="text" name="precio" class="input-form" id="precio" placeholder="Precio">
            <select list="company" type="list" name="company" class="input-form" id="company">
            <datalist id="company" disabled>
                <option value="company">Compañia</option>
                <?php 
                foreach ($company as $company){
                    echo '
                    <option value="'.$company['Id_companyName'].'">'.$company['name'].'</option>';
                }
                ?>
            </datalist>
            </select>
            <input type="text" name="codigo" class="input-form" id="codido_barras" placeholder="Codigo de barras">
            <div>
                <input type="submit" class='disabled-button-form' name="submit_add_product" id="submit_form" value="CREAR PRODUCTO">
            </div>
        </form>
    </div>
</body>
<script src="../Js/admin.js"></script>
<script src="../Js/add_user.js"></script>
</html>