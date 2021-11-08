<?php

include_once "../functions/connection.php";

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

// Función para buscar usuario por cedula
function search_user($conn, $cedula)
{

    $checkCedula = mysqli_real_escape_string($conn, $cedula);

    $sql = "SELECT * FROM usuarios WHERE cedula=?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos.";
        $_SESSION['tipo_mensaje'] = 2;
        header('location: ../php/admin.php');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $checkCedula);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);
        $userinfo = mysqli_fetch_assoc($result);

        if ($resultCheck > 0) {
            $_SESSION['s_success'] = true;
        } else {

            $_SESSION['mensaje'] = "Usuario no encontrado.";
            $_SESSION['tipo_mensaje'] = 1;
            $_SESSION['s_success'] = false;
        }

        return $userinfo;
    }
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

    $sql = "INSERT INTO usuarios VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?, ?, ?, ?, 0);";

    $stmt = mysqli_stmt_init($conn);

    // Preparar prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos." .mysqli_error($conn);
        $_SESSION['tipo_mensaje'] = 2;
        exit();
    } else {

        // Ejecutar query
        mysqli_stmt_bind_param($stmt, "sssssssiissss", $checkCedula, $checkUser, $checkClave, $checkPnombre, $checkSnombre, $checkPapellido, $checkSapellido, $checkNacionalidad, $checkAdmin, $checkFechaNac, $checkFechaIng, $checkCargo, $checkDpto);
        mysqli_stmt_execute($stmt);
    }
}

// Función que verifica si un usuario determinado está registrado en el sistema
function user_exists($conn, $cedula, $userid, $oguserid, $ogcedula)
{

    $exists = false;
    $checkUser = mysqli_real_escape_string($conn, $userid);
    $checkCedula = mysqli_real_escape_string($conn, $cedula);
    $checkOguser = mysqli_real_escape_string($conn, $oguserid);
    $checkOgcedula = mysqli_real_escape_string($conn, $ogcedula);

    $sql = "SELECT * FROM usuarios WHERE cedula=? AND userid!=?;";
    $sql2 = "SELECT * FROM usuarios WHERE userid=? AND cedula!=?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos." . mysqli_error($conn);
        $_SESSION['tipo_mensaje'] = 2;
        return $exists;
    } else {
        // Asociar parámetros a la plantilla
        mysqli_stmt_bind_param($stmt, "ss", $checkCedula, $checkOguser);

        // Correr statement con datos
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);

        // Revisar si se ingresaron datos correctos
        if ($resultCheck > 0) {
            // Cedula repetida
            $_SESSION['mensaje'] .= "<br> La cédula ingresada ya se encuentra registrada.";
            $_SESSION['tipo_mensaje'] = 1;
            $exists = true;
        }

        if (!mysqli_stmt_prepare($stmt, $sql2)) {
            // Falla del query
            $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos.";
            $_SESSION['tipo_mensaje'] = 2;
            return $exists;
        } else {
            // Asociar parámetros a la plantilla
            mysqli_stmt_bind_param($stmt, "ss", $checkUser, $checkOgcedula);

            // Correr statement con datos
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $resultCheck = mysqli_num_rows($result);

            // Revisar si se ingresaron datos correctos
            if ($resultCheck > 0) {
                // Cedula repetida
                $_SESSION['mensaje'] .= "<br> El nombre de usuario ingresado ya se encuentra registrado.";
                $_SESSION['tipo_mensaje'] = 1;
                $exists = true;
            }

            return $exists;
        }
    }
}

// Función para actualizar datos de usuario
function update_user($conn, $cedula, $clave, $pnombre, $snombre, $papellido, $sapellido)
{

    $checkCedula = mysqli_real_escape_string($conn, $cedula);
    $checkClave = mysqli_real_escape_string($conn, $clave);
    $checkPnombre = mysqli_real_escape_string($conn, $pnombre);
    $checkSnombre = mysqli_real_escape_string($conn, $snombre);
    $checkPapellido = mysqli_real_escape_string($conn, $papellido);
    $checkSapellido = mysqli_real_escape_string($conn, $sapellido);

    if (!empty($clave)) {
        $sql = "UPDATE usuarios SET clave=?, p_nombre=?, s_nombre=?, p_apellido=?, s_apellido=? WHERE cedula=?;";
    } else {
        $sql = "UPDATE usuarios SET p_nombre=?, s_nombre=?, p_apellido=?, s_apellido=? WHERE cedula=?;";
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
            mysqli_stmt_bind_param($stmt, "ssssss", $checkClave, $checkPnombre, $checkSnombre, $checkPapellido, $checkSapellido, $checkCedula);
            mysqli_stmt_execute($stmt);
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $checkPnombre, $checkSnombre, $checkPapellido, $checkSapellido, $checkCedula);
            mysqli_stmt_execute($stmt);
        }
    }
}

// Función para actualizar datos de usuario (admin)
function update_user_admin($conn, $cedula, $userid, $clave, $pnombre, $snombre, $papellido, $sapellido, $nacionalidad, $admin, $fechanac, $fechaing, $cargo, $dpto, $original)
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
    $checkOriginal = mysqli_real_escape_string($conn, $original);

    if (!empty($clave)) {
        $sql = "UPDATE usuarios SET cedula=?, userid=?, clave=?, p_nombre=?, s_nombre=?, p_apellido=?, s_apellido=?, nacionalidad=?, admin=?, fecha_nac=?, fecha_ing=?, cargo=?, dpto=? WHERE userid=?;";
    } else {
        $sql = "UPDATE usuarios SET cedula=?, userid=?, p_nombre=?, s_nombre=?, p_apellido=?, s_apellido=?, nacionalidad=?, admin=?, fecha_nac=?, fecha_ing=?, cargo=?, dpto=? WHERE userid=?;";
    }

    $stmt = mysqli_stmt_init($conn);

    // Preparar prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos.";
        $_SESSION['tipo_mensaje'] = 2;
        header('location: ../php/admin_editar.php');
        exit();
    } else {

        // Ejecutar query
        if (!empty($clave)) {
            mysqli_stmt_bind_param($stmt, "sssssssiisssss", $checkCedula, $checkUser, $checkClave, $checkPnombre, $checkSnombre, $checkPapellido, $checkSapellido, $checkNacionalidad, $checkAdmin, $checkFechaNac, $checkFechaIng, $checkCargo, $checkDpto, $checkOriginal);
            $_SESSION['search_userid'] = $checkUser;
            mysqli_stmt_execute($stmt);
        } else {
            mysqli_stmt_bind_param($stmt, "ssssssiisssss", $checkCedula, $checkUser, $checkPnombre, $checkSnombre, $checkPapellido, $checkSapellido, $checkNacionalidad, $checkAdmin, $checkFechaNac, $checkFechaIng, $checkCargo, $checkDpto, $checkOriginal);
            $_SESSION['search_userid'] = $checkUser;
            mysqli_stmt_execute($stmt);
        }
    }
}

// Función para activar/desactivar usuarios
function toggle_user($conn, $userid)
{

    $checkUser = mysqli_real_escape_string($conn, $userid);

    $sql = "UPDATE usuarios SET estado=!estado WHERE userid=?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la conexión a base de datos.";
        $_SESSION['tipo_mensaje'] = 2;
        header('location: ../php/admin.php');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $checkUser);
        mysqli_stmt_execute($stmt);
    }
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
    $sql = 'SELECT * FROM usuarios WHERE userid=?;';

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
        $dpto = mysqli_fetch_assoc($result);

        return $dpto;
    }
}

function fetch_dptos ($conn) {

    $dptos = [];

    $sql = "SELECT * FROM departamentos;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['mensaje'] .= "<br> Falla en la obtención de datos.";
        $_SESSION['tipo_mensaje'] = 2;
        return $dptos;
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $dptos = mysqli_fetch_all($result);
        return $dptos;
    }
}

// Función que busca cumpleaños
function birthdays($conn)
{

    $sql = "SELECT p_nombre, s_nombre, p_apellido, s_apellido FROM usuarios WHERE MONTH(fecha_nac) = MONTH(NOW()) AND DAY(fecha_nac) = DAY(NOW());";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Falla del query
        $_SESSION['mensaje'] .= "<br> Falla en la obtención de datos.";
        $_SESSION['tipo_mensaje'] = 2;
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            $cumpleaños = mysqli_fetch_all($result);
            return $cumpleaños;
        } else {
            $cumpleaños = "No hay cumpleaños el día de hoy.";
            return $cumpleaños;
        }
    }
}

// Función para almacenar la bitácora del usuario
function LogUserNavigation($usuario, $ref, $paso) {
    global $conn;
    $sql = "INSERT INTO rutas VALUES (NULL, '{$usuario}', NOW(), '{$ref}', '{$paso}');";
    $conn->query($sql);
}

function ListUsers() {
    global $conn;
    $sql = "SELECT * FROM usuarios ORDER BY p_apellido;";
    return $conn->query($sql);
}

function ListAFiscal() {
    global $conn;
    $sql = "SELECT * FROM fiscal WHERE estado = 1;";
    return $conn->query($sql);
}

function ListAllFiscal() {
    global $conn;
    $sql = "SELECT * FROM fiscal;";
    return $conn->query($sql);
}

function new_fiscal($fiscal){
    global $conn;
    $sql="UPDATE fiscal SET estado = 0 WHERE estado = 1;";
    $conn->query($sql);
    $sql="INSERT INTO fiscal VALUES (NULL, '{$fiscal}', 1);";
    $conn->query($sql);
}

function new_recibo($cedula, $ingreso, $sso, $lrpe, $faov, $mes) {
    global $conn;
    $fiscal = mysqli_fetch_assoc($conn->query("SELECT * FROM fiscal WHERE estado = 1;"));
    $fiscal = $fiscal['id'];
    $sql = "INSERT INTO recibos VALUES (NULL, '{$cedula}', '{$mes}', '{$fiscal}', '{$ingreso}', '{$sso}', '{$lrpe}', '{$faov}');";
    $conn->query($sql);
}

function new_islr($cedula, $ingreso, $deduc) {
    global $conn;
    $fiscal = mysqli_fetch_assoc($conn->query("SELECT * FROM fiscal WHERE estado = 1;"));
    $fiscal = $fiscal['id'];
    $sql = "INSERT INTO islr VALUES (NULL, '{$cedula}', '{$fiscal}', '{$ingreso}', '{$deduc}');";
    $conn->query($sql);
}

function fetch_recibos($fiscal, $cedula) {
    global $conn;
    $sql = "SELECT * FROM recibos WHERE fiscal = '{$fiscal}' AND cedula='{$cedula}';";
    return $conn->query($sql);
}

function fetch_islr($fiscal, $cedula) {
    global $conn;
    $sql = "SELECT * FROM islr WHERE fiscal = '{$fiscal}' AND cedula='{$cedula}';";
    return $conn->query($sql);
}

function fetch_fiscal($fiscal) {
    global $conn;
    $sql = "SELECT * FROM fiscal WHERE id = '{$fiscal}';";
    $result = $conn->query($sql);
    $año = mysqli_fetch_assoc($result);
    return $año['a_fiscal']; 
}

function fetch_mes($mes) {
    global $conn;
    $sql = "SELECT * FROM meses WHERE id = '{$mes}';";
    $result = $conn->query($sql);
    $mes = mysqli_fetch_assoc($result);
    return $mes['mes']; 
}