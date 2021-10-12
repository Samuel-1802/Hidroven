<!-- Función para actualizar datos de usuario (no admin) -->

<?php

if (isset($_POST)) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";
    $_SESSION['post'] = $_POST;

    //El usuario rellenó el formulario de login, sanitizar los datos ingresados
    $cedula = sanitize_cedula($_POST['n_cedula']);
    $userid = sanitize_userid($_POST['n_userid']);
    if (!empty($_POST['n_clave'])) {
        $clave = sanitize_clave($_POST['n_clave']);
        $clave = password_hash($_POST['n_clave'], PASSWORD_DEFAULT);
    } else {
        $clave = "";
    }
    $pnombre = sanitize_string($_POST['np_nombre']);
    $snombre = sanitize_string($_POST['ns_nombre']);
    $papellido = sanitize_string($_POST['np_apellido']);
    $sapellido = sanitize_string($_POST['ns_apellido']);
    $nacionalidad = sanitize_numero($_POST['n_nacionalidad']);
    $fechanac = sanitize_fecha($_POST['n_fechanac']);
    $cargo = sanitize_string($_POST['n_cargo']);
    $dpto = sanitize_dpto($_POST['n_departamento']);
    $ogcedula = sanitize_cedula($_POST['cedula']);
    $oguserid = sanitize_userid($_POST['userid']);

    $_SESSION['post'] = $nacionalidad;

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])){
        // Alguna validación encontró un error
        header("location: ../php/editar.php");
        exit();
    }

    // Revisar que los campos no estén vacíos
    if (empty_update_noadmin($cedula, $userid, $pnombre, $papellido, $nacionalidad, $fechanac, $cargo, $dpto) !== false) {
        // Algún campo está vacío
        header("location: ../php/editar.php");
        exit();
    } else {

        // Hacer una copia del usuario en la BD
        temp_copy($conn, $oguserid);

        // Revisar que la cédula o el nombre de usuario no se repitan
        if (user_exists($conn, $cedula, $userid) !== false && $cedula != $ogcedula && $userid != $oguserid) {
            // Redireccionar
            header("location: ../php/editar.php");
            exit();
        } else {

            // Actualizar los datos en la BD
            update_user($conn, $cedula, $userid, $clave, $pnombre, $snombre, $papellido, $sapellido, $nacionalidad, $fechanac, $cargo, $dpto, $oguserid);

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