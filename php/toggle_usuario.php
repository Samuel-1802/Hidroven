<!-- Función para eliminar usuarios -->

<?php

session_start();
include_once './connection.php';

// Query de usuario
$sql = 'SELECT * FROM usuarios WHERE cedula = ' . $_SESSION['s_cedula'] . ';';
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$uservars = mysqli_fetch_assoc($result);

if ($resultCheck > 0) {
    if ($uservars['activo'] == 1) {
        $sql = 'UPDATE usuarios SET activo = 0 WHERE cedula = ' . $_SESSION['s_cedula'] . ';';
        mysqli_query($conn, $sql);
        $_SESSION['d_confirm'] = "El usuario fue desactivado exitosamente.";
        $_SESSION['search'] = true;
        $_SESSION['s_estado'] = 0;
        header('Location: admin.php?deactivate=success');
    } else {
        $sql = 'UPDATE usuarios SET activo = 1 WHERE cedula = ' . $_SESSION['s_cedula'] . ';';
        mysqli_query($conn, $sql);
        $_SESSION['d_confirm'] = "El usuario fue activado exitosamente.";
        $_SESSION['search'] = true;
        $_SESSION['s_estado'] = 1;
        header('Location: admin.php?activate=success');
    }
} else {
    $_SESSION['d_confirm'] = "Error: el usuario no pudo ser desactivado.";
    $_SESSION['search'] = true;
    header('Location: admin.php?toggle=failed');
}

?>