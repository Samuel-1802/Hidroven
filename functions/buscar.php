<!-- Función para buscar un usuario en la base de datos por ci -->

<?php

if (isset($_POST)) {

    session_start();
    include_once './functions.php';
    include_once "./sql_queries.php";

    // Sanitizar datos ingresados
    $cedula = sanitize_cedula($_POST['ci']);

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])) {
        // Alguna validación encontró un error
        header("location: ../php/buscar.php");
        exit();
    }

    if (empty_search($cedula) !== false) {
        // Algún campo está vacío
        header("location: ../php/buscar.php");
        exit();
    } else {

        $searchResult = search_user($conn, $cedula);
        $_SESSION['search_userid'] = $searchResult['userid'];

        header("location: ../php/buscar.php");
        exit();

    }

} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
    exit();
}

?>