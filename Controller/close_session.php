<?php
    include './connection.php';
    header('location: ../index.php');
    session_start();
    session_destroy();
    $conn->query("DELETE FROM online WHERE id_user = '".$_SESSION['id_user']."'");    
    