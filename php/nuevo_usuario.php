<!-- Función para registrar nuevos usuarios -->

<?php

    session_start();
    include_once './connection.php';

    $cedula = $_POST['n_cedula'];
    $usuario = $_POST['n_userid'];

    // Query de usuario
    $sql = 'SELECT * FROM usuarios WHERE cedula = ' .$cedula .' OR userid = "' .$usuario .'";';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    //Vaciar mensaje
    if (isset($_SESSION['confirm'])){
        unset($_SESSION['confirm']);
    }

    if ($resultCheck > 0) {
        $_SESSION['confirm'] = 'Error: este usuario ya se encuentra registrado';
        header('Location: admin.php?register=failed');
    } else {

        $sql = 'INSERT INTO usuarios VALUES ('.$_POST['n_cedula'] .', "' .$_POST['n_nombre'] .'","' .$_POST['n_apellido'] .'","' .$_POST['n_nacionalidad'] .'","' .$_POST['n_userid'] .'","' .$_POST['n_clave'] .'",' .$_POST['n_admin'] .', 1);';
        mysqli_query($conn, $sql);

        $_SESSION['confirm'] = 'El usuario fue registrado exitosamente';
        header('Location: admin.php?register=success');
    }

?>