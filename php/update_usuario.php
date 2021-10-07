<!-- Función para registrar nuevos usuarios -->

<?php

    session_start();
    include_once './connection.php';

    //Query de usuario
    $sql = 'SELECT * FROM temp WHERE cedula = ' .$_SESSION['s_cedula'] .';';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    //Si hay un valor temporal del usuario en la db, eliminarlo
    if ($resultCheck > 0){
        $sql = 'DELETE FROM temp WHERE cedula =' .$_SESSION['s_cedula'] .';';
        mysqli_query($conn, $sql);
    }

    //Vaciar menjase
    if (isset($_SESSION['confirm'])){
        unset($_SESSION['confirm']);
    }
    
    if (isset($_SESSION['s_nombre'])) {
    // Insertar usuario actual en una tabla temporal
    $sql = 'INSERT INTO temp VALUES ('.$_SESSION['s_cedula'] .', "' .$_SESSION['s_nombre'] .'","' .$_SESSION['s_apellido'] .'","' .$_SESSION['s_nacionalidad'] .'","' .$_SESSION['s_userid'] .'","' .$_SESSION['s_clave'] .'",' .$_SESSION['s_admin'] .',' .$_SESSION['s_estado'] .');';
    mysqli_query($conn, $sql);

    // Encriptar nueva clave
    $hash = password_hash($_POST['n_clave'], PASSWORD_DEFAULT);

    //Actualizar los datos del usuario
    
    if ($_POST['n_clave']!='') {
        $sql = 'UPDATE usuarios SET cedula = '.$_POST['n_cedula'] .', nombre = "' .$_POST['n_nombre'] .'", apellido = "' .$_POST['n_apellido'] .'", nacionalidad = "' .$_POST['n_nacionalidad'] .'", userid = "' .$_POST['n_userid'] .'", clave = "' .$hash .'", isAdmin = ' .$_POST['n_admin'] .' WHERE cedula =' .$_SESSION['s_cedula'] .';';
        mysqli_query($conn, $sql); 
    } else {
        $sql = 'UPDATE usuarios SET cedula = '.$_POST['n_cedula'] .', nombre = "' .$_POST['n_nombre'] .'", apellido = "' .$_POST['n_apellido'] .'", nacionalidad = "' .$_POST['n_nacionalidad'] .'", userid = "' .$_POST['n_userid'] .'", isAdmin = ' .$_POST['n_admin'] .' WHERE cedula =' .$_SESSION['s_cedula'] .';';
        mysqli_query($conn, $sql); 
    }

    $_SESSION['s_cedula'] = $_POST['n_cedula'];
    $_SESSION['s_nombre'] = $_POST['n_nombre'];
    $_SESSION['s_apellido'] = $_POST['n_apellido'];
    $_SESSION['s_nacionalidad'] = $_POST['n_nacionalidad'];
    $_SESSION['s_userid'] = $_POST['n_userid'];
    $_SESSION['s_clave'] = $hash;
    $_SESSION['s_admin'] = $_POST['n_admin'];

    $_SESSION['confirm'] = 'El usuario fue modificado exitosamente';
    header('Location: edit_usuario.php?edit=success');
}
?>