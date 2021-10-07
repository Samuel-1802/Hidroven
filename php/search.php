<!-- Búsqueda de usuario -->

<?php

session_start();
include_once './connection.php';

$cedula = $_POST['ci'];

// Query de usuario
$sql = 'SELECT * FROM usuarios WHERE cedula = ' .$cedula .';';
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$uservars = mysqli_fetch_assoc($result);

//Vaciar menjase
if (isset($_SESSION['search_confirm'])){
    unset($_SESSION['search_confirm']);
}

if ($resultCheck < 1) {
    $_SESSION['search_confirm'] = 'Error: usuario no encontrado';
    $_SESSION['s_cedula'] = '';
    $_SESSION['s_nombre'] = '';
    $_SESSION['s_apellido'] = '';
    $_SESSION['s_userid'] = '';
    $_SESSION['s_admin'] = '';
    $_SESSION['s_estado'] = '';
    $_SESSION['search'] = false;
    header('Location: admin.php?search=failed');
} else {

    $_SESSION['s_cedula'] = $uservars['cedula'];
    $_SESSION['s_nombre'] = $uservars['nombre'];
    $_SESSION['s_apellido'] = $uservars['apellido'];
    $_SESSION['s_userid'] = $uservars['userid'];
    $_SESSION['s_clave'] = $uservars['clave'];
    $_SESSION['s_nacionalidad'] = $uservars['nacionalidad'];
    $_SESSION['s_admin'] = $uservars['isAdmin'];
    $_SESSION['s_estado'] = $uservars['activo'];
    
    $_SESSION['search'] = true;

    $_SESSION['search_confirm'] = 'Usuario encontrado';
    header('Location: admin.php?search=sucess');
}

?>