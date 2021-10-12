<?php

include_once "connection.php";

// Función para buscar usuario por userid
function user_login($conn, $userid, $clave)
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

// Función para copiar un usuario a la tabla temporal
function temp_copy($conn, $userid)
{
    $checkUser = mysqli_real_escape_string($conn, $userid);
    $sql = "DELETE FROM temp WHERE userid=?;";
    $sql2 = "INSERT INTO temp SELECT * FROM usuarios WHERE userid=?;";

    $stmt = mysqli_stmt_init($conn);

    // Preparar prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la autenticación de usuario.";
        $_SESSION['tipo_mensaje'] = 2;
        header('location: ../php/editar.php');
        exit();
    } else {

        // Eliminar datos de temp
        mysqli_stmt_bind_param($stmt, "s", $checkUser);
        mysqli_stmt_execute($stmt);

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql2)) {
            // Falla del query
            $_SESSION['mensaje'] .= "<br> Falla en la autenticación de usuario.";
            $_SESSION['tipo_mensaje'] = 2;
            header('location: ../php/editar.php');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $checkUser);
            mysqli_stmt_execute($stmt);
        }
    }
}

// Función para buscar usuario por userid
function search_user($conn, $cedula)
{
}

// Función para crear un usuario nuevo
function create_user($conn, $cedula, $userid, $clave, $pnombre, $snombre, $papellido, $sapellido, $nacionalidad, $admin, $fechanac, $fechaing, $cargo, $dpto)
{

    $checkCedula = mysqli_real_escape_string($conn, $cedula);
    $checkUser = mysqli_real_escape_string($conn, $userid);
    $checkClave = mysqli_real_escape_string($conn, $clave);
    $checkPnombre = mysqli_real_escape_string($conn, $pnombre);
    $checkSnombre = mysqli_real_escape_string($conn, $snombre);
    $checkPapellido = mysqli_real_escape_string($conn, $papellido);
    $checkSapellido = mysqli_real_escape_string($conn, $sapellido);
    $checkNacionalidad = mysqli_real_escape_string($conn, $nacionalidad);
    $checkAdmin = mysqli_real_escape_string($conn, $admin);
    $checkFechaNac = mysqli_real_escape_string($conn, $fechanac);
    $checkFechaIng = mysqli_real_escape_string($conn, $fechaing);
    $checkCargo = mysqli_real_escape_string($conn, $cargo);
    $checkDpto = mysqli_real_escape_string($conn, $dpto);

    $sql = "INSERT INTO usuarios VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    // Preparar prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos." .mysqli_error($conn);
        $_SESSION['tipo_mensaje'] = 2;
        header('location: ../php/admin.php');

        exit();
    } else {

        // Ejecutar query
        mysqli_stmt_bind_param($stmt, "sssssssiissss", $checkCedula, $checkUser, $checkClave, $checkPnombre, $checkSnombre, $checkPapellido, $checkSapellido, $checkNacionalidad, $checkAdmin, $checkFechaNac, $checkFechaIng, $checkCargo, $checkDpto);
        mysqli_stmt_execute($stmt);

    }

}

// Función que verifica si un usuario determinado está registrado en el sistema
function user_exists($conn, $userid, $cedula)
{

    $exists = false;
    $checkUser = mysqli_real_escape_string($conn, $userid);
    $checkCedula = mysqli_real_escape_string($conn, $cedula);

    $sql = "SELECT * FROM usuarios WHERE cedula=?;";
    $sql2 = "SELECT * FROM usuarios WHERE userid=?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos." .mysqli_error($conn);
        $_SESSION['tipo_mensaje'] = 2;
        return $exists;
    } else {
        // Asociar parámetros a la plantilla
        mysqli_stmt_bind_param($stmt, "s", $checkCedula);

        // Correr statement con datos
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);

        // Revisar si se ingresaron datos correctos
        if ($resultCheck > 0) {
            // Cedula repetida
            $_SESSION['mensaje'] = "<br> La cédula ingresada ya se encuentra registrada.";
            $_SESSION['tipo_mensaje'] = 1;
            $exists = true;
        }

        if (!mysqli_stmt_prepare($stmt, $sql2)) {
            // Falla del query
            $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos." .mysqli_error($conn);
            $_SESSION['tipo_mensaje'] = 2;
            return $exists;
        } else {
            // Asociar parámetros a la plantilla
            mysqli_stmt_bind_param($stmt, "s", $checkUser);

            // Correr statement con datos
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);

            // Revisar si se ingresaron datos correctos
            if ($resultCheck > 0) {
                // Cedula repetida
                $_SESSION['mensaje'] .= "<br> El nombre de usuario ya se encuentra registrado.";
                $_SESSION['tipo_mensaje'] = 1;
                $exists = true;
            }

            return $exists;
        }
    }
}

// Función para actualizar datos de usuario
function update_user($conn, $cedula, $userid, $clave, $pnombre, $snombre, $papellido, $sapellido, $nacionalidad, $fechanac, $cargo, $dpto, $original)
{

    $checkCedula = mysqli_real_escape_string($conn, $cedula);
    $checkUser = mysqli_real_escape_string($conn, $userid);
    $checkClave = mysqli_real_escape_string($conn, $clave);
    $checkPnombre = mysqli_real_escape_string($conn, $pnombre);
    $checkSnombre = mysqli_real_escape_string($conn, $snombre);
    $checkPapellido = mysqli_real_escape_string($conn, $papellido);
    $checkSapellido = mysqli_real_escape_string($conn, $sapellido);
    $checkNacionalidad = mysqli_real_escape_string($conn, $nacionalidad);
    $checkFechaNac = mysqli_real_escape_string($conn, $fechanac);
    $checkCargo = mysqli_real_escape_string($conn, $cargo);
    $checkDpto = mysqli_real_escape_string($conn, $dpto);
    $checkOriginal = mysqli_real_escape_string($conn, $original);

    if (!empty($clave)) {
        $sql = "UPDATE usuarios SET cedula=?, userid=?, clave=?, p_nombre=?, s_nombre=?, p_apellido=?, s_apellido=?, nacionalidad=?, fecha_nac=?, cargo=?, dpto=? WHERE userid=?;";
    } else {
        $sql = "UPDATE usuarios SET cedula=?, userid=?, p_nombre=?, s_nombre=?, p_apellido=?, s_apellido=?, nacionalidad=?, fecha_nac=?, cargo=?, dpto=? WHERE userid=?;";
    }

    $stmt = mysqli_stmt_init($conn);

    // Preparar prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos.";
        $_SESSION['tipo_mensaje'] = 2;
        header('location: ../php/editar.php');
        exit();
    } else {

        // Ejecutar query
        if (!empty($clave)) {
            mysqli_stmt_bind_param($stmt, "sssssssissss", $checkCedula, $checkUser, $checkClave, $checkPnombre, $checkSnombre, $checkPapellido, $checkSapellido, $checkNacionalidad, $checkFechaNac, $checkCargo, $checkDpto, $checkOriginal);
            $_SESSION['userid'] = $userid;
            mysqli_stmt_execute($stmt);
        } else {
            mysqli_stmt_bind_param($stmt, "ssssssissss", $checkCedula, $checkUser, $checkPnombre, $checkSnombre, $checkPapellido, $checkSapellido, $checkNacionalidad, $checkFechaNac, $checkCargo, $checkDpto, $checkOriginal);
            $_SESSION['userid'] = $userid;
            mysqli_stmt_execute($stmt);
        }
    }
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
        $_SESSION['userid'] = $userinfo['userid'];

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
        $dpto = mysqli_fetch_assoc($result);

        return $dpto;
    }
}
