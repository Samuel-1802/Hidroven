<?php
    session_start(); 

    // Iniciar/Cerrar sesión
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $_SESSION['loggedin'] = false;
        header('Location: login.php');
    } else {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Hidroven</title>
        
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>  
    <body>
        <!-- Dummy -->
    </body>
</html>