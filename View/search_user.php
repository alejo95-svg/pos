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
/*     require ('../Controller/connection.php');
    require ('../Controller/connection.php');
    include '../Model/consulta.php';
    include('./navbar.php'); */
    ?>
    <h3 class='title-form'>Buscar Usuario</h3>
    <div class="container-form-2 form-add-user">
        <form action="" method="POST">
            <input type="text" name="bUsuario" class="input-form" id="bUsuario" placeholder="Buscar Usuario">
        </form>
        <div id='rBusqueda'></div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../Js/admin.js"></script>
<script src="../Js/search_user.js"></script>
</html>