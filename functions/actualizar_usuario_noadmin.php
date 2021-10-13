<!-- Función para actualizar datos de usuario (no admin) -->

<?php

if (isset($_POST)) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    //El usuario rellenó el formulario, sanitizar los datos ingresados
    if (!empty($_POST['n_clave'])) {
        $clave = sanitize_clave($_POST['n_clave']);
        //pasar la clave a hash
        $clave = password_hash($clave, PASSWORD_DEFAULT);
    } else {
        $clave = "";
    }

    $pnombre = sanitize_string($_POST['np_nombre'], "primer nombre");
    $snombre = sanitize_string($_POST['ns_nombre'], "segundo nombre");
    $papellido = sanitize_string($_POST['np_apellido'], "primer apellido");
    $sapellido = sanitize_string($_POST['ns_apellido'], "segundo apellido");
    $cedula = sanitize_cedula($_POST['cedula']);
    $userid = sanitize_userid($_POST['userid']);

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])){
        // Alguna validación encontró un error
        header("location: ../php/editar.php");
        exit();
    }

    // Revisar que los campos necesarios no estén vacíos
    if (empty_update_noadmin($pnombre, $papellido) !== false) {
        // Algún campo está vacío
        header("location: ../php/editar.php");
        exit();
    } else {

        // Hacer una copia del usuario en la BD
        temp_copy($conn, $oguserid);

        // Revisar que la cédula o el nombre de usuario no se repitan
        if (user_exists($conn, $cedula, $userid, $userid, $cedula) !== false) {
            // Redireccionar
            header("location: ../php/editar.php");
            exit();
        } else {

            // Actualizar los datos en la BD
            update_user($conn, $cedula, $clave, $pnombre, $snombre, $papellido, $sapellido);

            $_SESSION['mensaje'] = "Datos actualizados exitosamente.";
            $_SESSION['tipo_mensaje'] = 0;

            header("location: ../php/editar.php");
            exit();
        }
    }
} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
    exit();
}
?>