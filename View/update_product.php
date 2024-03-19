<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/cd8ffc90f9.js" crossorigin="anonymous"></script>
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
    <h3 class='title-form' id="title">Actualizar productos</h3>
    <div class="container-form-2 form-add-user">
        <form action="" method="POST">
            <input type="text" name="bProduct" class="input-form" id="bProduct" placeholder="Buscar Producto" autocomplete="off">
        </form>
        <div id='rBusqueda'></div>
        <?php 
            if(isset($_POST['updateP'])){
                echo '<script>
                title.setAttribute("hidden", true);
                bProduct.type ="hidden";
                </script>';
                $producto = $_POST['producto'];
                $dProducto = consulta_producto($_SESSION['datos'][$producto]['barCode']);
                echo '
                <div class="container-form form-add-user">
                <form action="../Controller/variables.php" class="form_add" method="POST">
                    <input type="text" name="nombre" class="input-form" id="nombre" placeholder="Nombre" value="'.$dProducto[0]['name'].'">
                    <select list="tamanio" type="text" name="tamanio" class="input-form" id="tamanio" placeholder="Tamaño">
                    <datalist id="tamanio">';
                        foreach ($size as $size){
                           echo '<option value="'.$size['Id_size'].'">'.$size['name'].'</option>';
                        }
                    echo '<script>tamanio.value = '.$dProducto[0]['Id_size'].'</script>';
                    echo'
                    </datalist>
                    </select>
                    <select list="tipoProducto" type="list" name="tProduct" class="input-form" id="tProduct" placeholder="Tipo de Producto">
                    <datalist id="tipoProducto">';
                        foreach ($tProducto as $tProducto){
                            echo '
                            <option value="'.$tProducto['Id_type'].'">'.$tProducto['name'].'</option>';
                        }
                    echo '<script>tProduct.value = '.$dProducto[0]['Id_type'].'</script>';
                    echo'
                    </datalist>
                    </select>
                    <input type="text" name="precio" class="input-form" id="documento" placeholder="Precio" value="'.$dProducto[0]['price'].'">
                    <select list="company" type="list" name="company" class="input-form" id="company" placeholder="Compañia">
                    <datalist id="company">';
                        foreach ($company as $company){
                            echo '
                            <option value="'.$company['Id_companyName'].'">'.$company['name'].'</option>';
                        }
                    echo '<script>company.value = '.$dProducto[0]['Id_companyName'].'</script>';
                    echo'
                    </datalist>
                    </select>

                    <input type="text" name="codigo" class="input-form" id="codigo" placeholder="Código de barras" value="'.$dProducto[0]['barCode'].'">
                    <input type="hidden" name="barCode" value="'.$dProducto[0]['barCode'].'">
                    <div>
                        <input type="submit" class="disabled-button-form" name="update-product" id="update-user" value="Actualizar" >
                    </div>
                ';
            }
        ?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../Js/admin.js"></script>
<script src="../Js/update_product.js"></script>
</html>