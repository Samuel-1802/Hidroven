<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
} else {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Hidroven</title>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>  
    <body>
    <?php 

    echo "Hello world";

    ?>

    <form action="./auth.php" method="POST">
        <button type="submit" class="btn btn btn-primary m-2">Salir</button>
    </form>

    </body>
</html>