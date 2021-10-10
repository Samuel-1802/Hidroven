<!-- Función para registrar nuevos usuarios -->

<?php

session_start();
include_once './connection.php';

//Query de usuario
$sql = 'SELECT * FROM temp WHERE cedula = ' . $_SESSION['cedula'] . ';';
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

//Si hay un valor temporal del usuario en la db, eliminarlo
if ($resultCheck > 0) {
    $sql = 'DELETE FROM temp WHERE cedula =' . $_SESSION['cedula'] . ';';
    mysqli_query($conn, $sql);
}

//Vaciar menjase
if (isset($_SESSION['confirm'])) {
    unset($_SESSION['confirm']);
}

if (isset($_SESSION['s_nombre'])) {
    // Insertar usuario actual en una tabla temporal
    $sql = 'INSERT INTO temp VALUES (' . $_SESSION['cedula'] . ', "' . $_SESSION['nombre'] . '","' . $_SESSION['apellido'] . '","' . $_SESSION['nacionalidad'] . '","' . $_SESSION['userid'] . '","' . $_SESSION['clave'] . '",' . $_SESSION['isAdmin'] . ',' . $_SESSION['estado'] . ');';
    mysqli_query($conn, $sql);

    // Encriptar nueva clave
    $hash = password_hash($_POST['n_clave'], PASSWORD_DEFAULT);

    //Actualizar los datos del usuario
    if ($_POST['n_clave'] != '') {
        $sql = 'UPDATE usuarios SET cedula = ' . $_POST['n_cedula'] . ', nombre = "' . $_POST['n_nombre'] . '", apellido = "' . $_POST['n_apellido'] . '", nacionalidad = "' . $_POST['n_nacionalidad'] . '", userid = "' . $_POST['n_userid'] . '", clave = "' . $hash . ' WHERE cedula =' . $_SESSION['cedula'] . ';';
        mysqli_query($conn, $sql);
    } else {
        $sql = 'UPDATE usuarios SET cedula = ' . $_POST['n_cedula'] . ', nombre = "' . $_POST['n_nombre'] . '", apellido = "' . $_POST['n_apellido'] . '", nacionalidad = "' . $_POST['n_nacionalidad'] . '", userid = "' . $_POST['n_userid'] . '" WHERE cedula =' . $_SESSION['cedula'] . ';';
        mysqli_query($conn, $sql);
    }

    $_SESSION['cedula'] = $_POST['n_cedula'];
    $_SESSION['nombre'] = $_POST['n_nombre'];
    $_SESSION['apellido'] = $_POST['n_apellido'];
    $_SESSION['nacionalidad'] = $_POST['n_nacionalidad'];
    $_SESSION['userid'] = $_POST['n_userid'];
    $_SESSION['clave'] = $hash;

    $_SESSION['confirm'] = 'El usuario fue modificado exitosamente';
    header('Location: editar.php?edit=success');
}
?>