<!-- Función para agregar un nuevo usuario -->

<?php
if (isset($_POST)) {

    session_start();
    include_once './functions.php';
    include_once "./sql_queries.php";

    // Sanitizar datos ingresados
    $cedula = sanitize_cedula($_POST['n_cedula']);
    $userid = sanitize_userid($_POST['n_userid']);

    $clave = sanitize_clave($_POST['n_clave']);
    // pasar la clave a hash
    $clave = password_hash($clave, PASSWORD_DEFAULT);

    $pnombre = sanitize_string($_POST['np_nombre']);
    $snombre = sanitize_string($_POST['ns_nombre']);
    $papellido = sanitize_string($_POST['np_apellido']);
    $sapellido = sanitize_string($_POST['ns_apellido']);
    $nacionalidad = sanitize_numero($_POST['n_nacionalidad']);
    $admin = sanitize_numero($_POST['n_admin']);
    $fechanac = sanitize_fecha($_POST['n_fechanac']);
    $fechaing = sanitize_fecha($_POST['n_fechaing']);
    $cargo = sanitize_string($_POST['n_cargo']);
    $dpto = sanitize_dpto($_POST['n_departamento']);

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])) {
        // Alguna validación encontró un error
        header("location: ../php/admin.php");
        exit();
    }

    // Revisar que los campos necesarios no estén vacíos
    if (empty_admin($cedula, $clave, $userid, $pnombre, $papellido, $nacionalidad, $admin, $fechanac, $fechaing, $cargo, $dpto, true) !== false) {
        // Algún campo está vacío
        header("location: ../php/admin.php");
        exit();
    } else {

        // Revisar que la cédula o el nombre de usuario no se repitan
        if (user_exists($conn, $cedula, $userid)) {
            // Redireccionar
            header("location: ../php/admin.php");
            exit();
        } else {

            // Agregar nuevo usuario
            create_user($conn, $cedula, $userid, $clave, $pnombre, $snombre, $papellido, $sapellido, $nacionalidad, $admin, $fechanac, $fechaing, $cargo, $dpto);

            $_SESSION['mensaje'] .= "Usuario agregado exitosamente.";
            $_SESSION['tipo_mensaje'] = 0;

            header("location: ../php/admin.php");
            exit();
        }
    }
} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
    exit();
}
?>