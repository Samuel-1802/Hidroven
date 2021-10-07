<!-- Función de autenticación de usuario -->

<?php

    session_start();
    include_once './connection.php';

    // Query de usuario
    $sql = 'SELECT * FROM usuarios WHERE userid = "' .$_POST['Username'] .'" AND activo = 1;';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $uservars = mysqli_fetch_assoc($result);

    // Iniciar/Cerrar sesión
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // Cerrar sesión
        $_SESSION = [];
        session_destroy();
        header('Location: index.php');
    } else {
        
        // Si hubo un mensaje de error anteriormente, eliminarlo
        if (isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }

        // Log in

        // Revisar si los campos están vaciós, de ser así, desplegar mensaje de error
        if ($_POST['Username'] == '' || $_POST['Password'] == '') {

            $_SESSION['error'] = 'por favor ingrese usuario y clave.';
            $_SESSION['loggedin'] = false;
            header('Location: login.php');

        } else if ($resultCheck > 0) {

            // Si la combinación de usuario y clave son correctas, log in, si no, desplegar mensaje

            //Verificar clave ingresada, si es correcta, hacer login

            if (password_verify($_POST['Password'], $uservars['clave'])) {
                $_SESSION['nombre'] = $uservars['nombre'];
                $_SESSION['apellido'] = $uservars['apellido'];
                $_SESSION['nacionalidad'] = $uservars['nacionalidad'];
                $_SESSION['userid'] = $uservars['userid'];
                $_SESSION['isAdmin'] = $uservars['isAdmin'];
                $_SESSION['loggedin'] = true;
                $_SESSION['cedula'] = $uservars['cedula'];
                $_SESSION['estado'] = $uservars['activo'];
                header('Location: index.php');
            } else {
                $_SESSION['error'] = 'usuario y/o clave no válidos.';
                $_SESSION['loggedin'] = false;
                header('Location: login.php');
            }

        } else {
            $_SESSION['error'] = 'usuario y/o clave no válidos.';
            $_SESSION['loggedin'] = false;
            header('Location: login.php');
        }
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