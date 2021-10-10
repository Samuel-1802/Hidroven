<?php

include_once "./connection.php";

// Función para buscar usuario por userid
function search_user_login($conn, $userid, $clave)
{

    $login = false;

    // Escapamos el dato ingresado primero
    $checkUser = mysqli_real_escape_string($conn, $userid);

    // Plantilla del query
    $sql = 'SELECT * FROM usuarios WHERE userid=? AND estado=1;';

    // Prepared statement
    $stmt = mysqli_stmt_init($conn);

    // Preparar prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la autenticación de usuario.";
        $_SESSION['tipo_mensaje'] = 2;
        header('location: /php/login.php');
        return $login;
        exit();
    } else {

        // Asociar parámetros a la plantilla
        mysqli_stmt_bind_param($stmt, "s", $checkUser);

        // Correr statement con datos
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);
        $uservars = mysqli_fetch_assoc($result);

        // Revisar si se ingresaron datos correctos
        if (!($resultCheck > 0) || !(password_verify($clave, $uservars['clave']))) {

            // Usuario o clave incorrectos incorrecto
            $_SESSION['mensaje'] = "<br> Usuario y/o clave no válidos.";
            $_SESSION['tipo_mensaje'] = 1;
            return $login;
            exit();
        } else {

            // Ingreso válido
            $login = true;
            return $login;
            exit();
        }
    }
}

// Función para buscar usuario por cedula y nombre de usuario
function search_user_add($conn, $cedula, $userid)
{
}

// Función para buscar usuario por userid
function search_user($conn, $cedula)
{
}

// Función para realizar login
function login($conn, $userird, $password)
{
}

// Función para crear un usuario nuevo
function create_user($conn)
{
}

// Función para actualizar datos de usuario
function update_user($conn)
{
}

// Función para actualizar datos de usuario (admin)
function update_user_admin($conn)
{
}

// Función para activar/desactivar usuarios
function toggle_user($conn)
{
}

// Función para obtener los datos del usuario
function fetch_user($conn, $userid)
{

    $userinfo = array(
        "cedula" => "",
        "p_nombre" => "",
        "p_apellido" => "",
        "s_nombre" => "",
        "s_apellido" => "",
        "nacionalidad" => 0,
        "admin" => 0,
        "estado" => 1,
        "fecha_nac" => "0000-00-00",
        "fecha_ing" => "0000-00-00",
        "cargo" => "",
        "dpto" => 0
    );

    // Escapamos el dato ingresado primero
    $checkUser = mysqli_real_escape_string($conn, $userid);

    // Plantilla del query
    $sql = 'SELECT * FROM usuarios WHERE userid=? AND estado=1;';

    // Prepared statement
    $stmt = mysqli_stmt_init($conn);

    // Preparar prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la autenticación de usuario.";
        $_SESSION['tipo_mensaje'] = 2;
        header('location: /php/login.php');
        return $userinfo;
    } else {

        // Asociar parámetros a la plantilla
        mysqli_stmt_bind_param($stmt, "s", $checkUser);

        // Correr statement con datos
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $userinfo = mysqli_fetch_assoc($result);

        return $userinfo;
    }
}

// Función para obtener el departamento al cual el usuario pertenece
function fetch_dpto($conn, $id)
{

    $dpto = "";

    // Escapamos el dato ingresado primero
    $checkId = mysqli_real_escape_string($conn, $id);

    // Plantilla de query
    $sql = "SELECT dpto FROM departamentos WHERE id=?;";

    // Prepared statement
    $stmt = mysqli_stmt_init($conn);

    // Preparar prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la obtención de datos.";
        $_SESSION['tipo_mensaje'] = 2;
        return $dpto;
    } else {

        // Asociar parámetros a la plantilla
        mysqli_stmt_bind_param($stmt, "s", $checkId);

        // Correr statement con datos
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $dpto = $row[0];

        return $dpto;
    }
}
