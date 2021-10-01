<?php

    session_start();
    // Iniciar/Cerrar sesión
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        session_destroy();
        header('Location: index.php');
    } else {
        
        // Si hubo un mensaje de error anteriormente, eliminarlo
        if (isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }

        // Log in
        $_SESSION['loggedin'] = true;

        // Si hubo input en ambos campos del login, guardar las variables, si no hubo input en ningún campo,
        // colocar usuario Invitado, si solo se rellenó uno de los dos campos, regresar a index.php y desplegar un mensaje de error.
        if (isset($_POST['Username']) && isset($_POST['Password']) && $_POST['Username'] != '' && $_POST['Password'] != '') {
            $_SESSION['usuario'] = $_POST['Username'];
            $_SESSION['clave'] = $_POST['Password'];
        } else if ($_POST['Username'] == '' && $_POST['Password'] == '') {
            $_SESSION['usuario'] = 'Invitado';
        } else {
            $_SESSION['error'] = 'ingrese usuario y clave, o deje ambos campos vacíos';
            $_SESSION['loggedin'] = false;
            header('Location: index.php');
        }

        header('Location: home.php');
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
        <?php
            // if (isset($_SESSION)){
            //     var_dump($_SESSION);
            //     var_dump($_POST);
            // }
        ?>
    </body>
</html>