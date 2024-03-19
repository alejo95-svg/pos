<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <title>Tolitamal</title>
</head>
<body>
<?php 
    include '../Controller/includes.php';
/*     require ('../Controller/connection.php');
    include '../Model/consulta.php';
    include('./navbar.php'); */
?>
    <div class="container">
        <a href="./add_product.php" class="buttons-cards">
            <p>Agregar Producto</p>
            <img src="../img/add_product.png" alt="add_user" class="img_crud">
        </a>
        <a href="./search_product.php" class="buttons-cards">
            <p>Buscar Producto</p>
            <img src="../img/search_product.png" alt="Search_user" class="img_crud">
        </a>
        <a href="./update_product.php" class="buttons-cards">
            <p>Actualizar Producto</p>
            <img src="../img/update_product.png" alt="Update_user" class="img_crud">
        </a>
        <a href="./delete_product.php" class="buttons-cards">
            <p>Borrar Producto</p>
            <img src="../img/delete_product.png" alt="Delete_user" class="img_crud">
        </a>
    </div>
</body>
<script src="../Js/admin.js"></script>
</html>