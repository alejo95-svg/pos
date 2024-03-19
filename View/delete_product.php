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
    ?>
    <h3 class='title-form'>Borrar Producto</h3>
    <div class="container-form-2 form-add-user">
        <form action="" method="POST">
            <input type="text" name="bProduct" class="input-form" id="bProduct" placeholder="Buscar Producto">
        </form>
        <div id='rBusqueda'></div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../Js/admin.js"></script>
<script src="../Js/delete_product.js"></script>
</html>