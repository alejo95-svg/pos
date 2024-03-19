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
    require ('../Controller/connection.php');
    include '../Model/consulta.php';
    include('./navbar.php');
    $uOnline = uOnline();
    ?>
    <div class="container">
        <a href="./add_user.php" class="buttons-cards">
            <p>Agregar Usuario</p>
            <img src="../img/add_user_2.png" alt="add_user" class="img_crud">
        </a>
        <a href="./search_user.php" class="buttons-cards">
            <p>Buscar Usuario</p>
            <img src="../img/search_user.png" alt="Search_user" class="img_crud">
        </a>
        <a href="./update_user.php" class="buttons-cards">
            <p>Actualizar Usuario</p>
            <img src="../img/update_user.png" alt="Update_user" class="img_crud">
        </a>
        <a href="./delete_user.php" class="buttons-cards">
            <p>Borrar Usuario</p>
            <img src="../img/delete_user.png" alt="Delete_user" class="img_crud">
        </a>
    </div>
</body>
<script src="../Js/admin.js"></script>
</html>