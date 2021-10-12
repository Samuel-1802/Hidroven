<!-- Función para buscar un usuario en la base de datos por ci -->

<?php

if (isset($_POST)) {

    session_start();
    include_once './functions.php';
    include_once "./sql_queries.php";

    // Sanitizar datos ingresados
    $cedula = sanitize_cedula($_POST['ci']);

    

} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
    exit();
}

?>