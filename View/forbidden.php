
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <title>ERROR</title>
</head>
<body <?php echo 'class="denied"'; ?>>
    <?php echo '<div class="img-container"><img src="../img/forbidden1.png" class="img-denied" alt="Error"></div>';?>
</body>
</html>

<?php
    header("refresh:3;url=../Controller/close_session.php");

?>

