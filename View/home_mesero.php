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
    $mesa = mesas();
    ?>
    <section>
        <?php
        foreach ($mesa as $mesa) {
            echo '
                <form action="../Controller/variables.php" method="POST">
                    <input type="hidden" name="mesa" value ="'.$mesa['Id_mesa'].'">
                    <input type="submit" class="card" name="table" value="'.$mesa['numero'].'">
                </form>
            ';
        }
        ?>

    </section>
</body>
<script src="../Js/admin.js"></script>
<script src="../Js/home_cajero.js"></script>

</html>