<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Document</title>
</head>
<body>
<?php
    include '../Controller/includes.php';
    $oculto = $_SESSION['oculto'];
    $oculto_botones = $_SESSION['oculto_botones'];
    $oculto_tamales = $_SESSION['oculto_tamales'];
    $oculto_bebidas = $_SESSION['oculto_bebidas'];
    $mesa = consultaMesa($_SESSION['numeroMesa']);
    $nMesa = $mesa['name'];
    if (isset($_SESSION['flag'])) {
        msg();
        unset($_SESSION['flag'], $_SESSION['msg']);
        echo '<script>setTimeout("document.location.reload()",2000);</script>';
    }
    /* consulta con mesa si hay productos */
    ?>
    <div class="container-mesa">
        <div class="mesa-buttons-container">
            <div class="mesa-title">
                <?php 
                   echo '<p>'.$nMesa.'</p>';
                ?>
        </div>
            <?php
                if($_SESSION['oculto'] == '') {
                    formAddProduct();
                }

                if($_SESSION['oculto_botones'] ==  '') {
                    menu();
                }

                if($_SESSION['oculto_bebidas'] ==  '') {
                    bebidas();
                }

                if($_SESSION['jugos_flag']) {
                    jugos($mesa);
                }

                if($_SESSION['tamal_flag']){
                    tamales($mesa);
                }

                if(isset($_SESSION['bebidas_flag'])){
                    /* bebidas($mesa, $oculto_bebidas); */
                }
            ?>

<!--             <form action="" class="container-products">
                <input type="submit" class="products-buttons" name="paquetes" value="JUGOS">
                <input type="submit" class="products-buttons" name="paquetes" value="GASEOSAS">
                <input type="submit" class="products-buttons" name="paquetes" value="BEBIDAS CALIENTES">
                <input type="submit" class="products-buttons" name="paquetes" value="BEBIDAS FRIAS">
            </form> -->

        </div>
    </div>
</body>
<script src="../Js/admin.js"></script>
<script src="../Js/cuenta_mesa.js"></script>
</html>