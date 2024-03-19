<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cd8ffc90f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./Css/style.css">
    <title>Tolitamal</title>
</head>

<body >
    <?php include('./View/navbar.php');?>
    <section>
        <div class="section--container">
            <div class="section--card-1">
                <form action="./View/login.php" method="POST">
                    <input type="hidden" name="rol" class="test" value="Administrador"><!-- clase prueba test  -->
                    <input type="submit" class="button" name="submit_rol" value="Administrador">
                    <!-- <i class="fa-solid fa-square-check"></i> -->
                </form>
            </div>
            <div class="section--card-2">
                <form action="./View/login.php" method="POST">
                    <input type="hidden" name="rol" value="Cajero">
                    <input type="submit" class="button" name="submit_rol" value="Cajero">
                </form>
            </div>
            <div class="section--card-3">
                <form action="./View/login.php" method="POST">
                    <input type="hidden" name="rol" value="Mesero">
                    <input type="submit" class="button" name="submit_rol" value="Mesero">
                </form>
            </div>
        </div>
    </section>
    
</body>
    
</html>