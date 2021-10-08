<?php

    include_once "./connection.php";

    // Función para buscar usuario por userid
    function search_user_login($conn, $userid) {

        // Si hubo un mensaje de error anteriormente, eliminarlo
        if (isset($_SESSION['mensaje'])){
            unset($_SESSION['mensaje']);
        }

        // Escapamos el dato ingresado primero
        $checkUser = mysqli_real_escape_string($conn, $userid);

        // Plantilla del query
        $sql = 'SELECT * FROM usuarios WHERE userid=? AND activo=1;';

        // Prepared statement
        $stmt = mysqli_stmt_init($conn);

        // Preparar prepared statement
        if (!mysqli_stmt_prepare($stmt, $sql)){

            // Falla
            

        } else {

            // Asociar parámetros a la plantilla
            mysqli_stmt_bind_param($stmt, "s", $checkUser);

            // Correr statement con datos
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);

            // 
        }
    }

    // Función para buscar usuario por cedula y nombre de usuario
    function search_user_add($conn, $cedula, $userid) {

    }

    // Función para buscar usuario por userid
    function search_user($conn, $cedula) {

    }

    // Función para realizar login
    function login($conn, $userird, $password) {

    }

    // Función para crear un usuario nuevo
    function create_user($conn) {

    }

    // Función para actualizar datos de usuario
    function update_user($conn) {

    }

    // Función para actualizar datos de usuario (admin)
    function update_user_admin($conn) {

    }

    // Función para activar/desactivar usuarios
    function toggle_user($conn) {

    }

?>