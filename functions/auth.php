<!-- Función de autenticación de usuario -->

<?php

//Revisar si se llego mediante el método POST
if (isset($_POST)) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    //El usuario rellenó el formulario de login, sanitizar los datos ingresados
    $userid = sanitize_userid($_POST["Username"]);
    $clave = sanitize_clave($_POST["Password"]);

    //Revisar si los campos están vacíos
    if (empty_login($userid, $clave) !== false) {

        // Algún campo está vacío
        $_SESSION['mensaje'] = $_SESSION['mensaje'];
        header("location: ../php/login.php");
        exit();
    } else if (search_user_login($conn, $userid, $clave) == false) {

        // El usuario no está registrado y/o la clave es incorrecta
        header("location: ../php/login.php");
        exit();
    } else {

        // El usuario accedió exitosamente al sistema
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $userid;
        header('location: ../php/index.php');
        exit();
    }
} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
    exit();
}

?>