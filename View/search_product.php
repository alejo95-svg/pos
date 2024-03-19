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
/*     require ('../Controller/connection.php');
    require ('../Controller/connection.php');
    include '../Model/consulta.php';
    include('./navbar.php'); */
    ?>
    <h3 class='title-form'>Buscar Producto</h3>
    <div class="container-form-2 form-add-user">
        <form action="" method="POST">
            <input type="text" name="bProduct" class="input-form bProduct" id="bProduct" placeholder="Buscar Producto" autocomplete="off">
            <button for="bProduct" class="button-delete-index" hidden><i class="fa-regular fa-circle-xmark button-delete-index"></i></button>
            
        </form>
        <div id='rBusqueda'></div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../Js/admin.js"></script>
<script src="../Js/search_product.js"></script>
</html>