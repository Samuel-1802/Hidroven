<!-- Función para activar/desactivar usuarios -->

<?php

if (isset($_POST)) {

    session_start();
    include_once './functions.php';
    include_once "./sql_queries.php";

    // Sanitizar datos ingresados
    $userid = sanitize_userid($_SESSION['search_userid']);

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])) {
        // Alguna validación encontró un error
        header("location: ../php/buscar.php");
        exit();
    }

        toggle_user($conn, $userid);

        header("location: ../php/buscar.php");
        exit();

} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
    exit();
}

?>