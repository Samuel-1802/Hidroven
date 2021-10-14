<!-- Funciones de la intranet -->
<?php

// Función para validar que los datos en el login no estén vacíos
function empty_login($userid, $clave)
{

    $result = false;

    if (empty($userid) || empty($clave)) {

        $result = true;
        $_SESSION['mensaje'] = "<br>Por favor ingrese usuario y clave.";
        $_SESSION['tipo_mensaje'] = 1;
        return $result;
    } else {
        return $result;
    }
}

// Función para validar que los datos necesarios en la edición de usuario (no admin) no esté vacíos
function empty_update_noadmin($pnombre, $papellido) {
    
    $result = false;

    if (empty($pnombre) || empty($papellido)) {

        $result = true;
        $_SESSION['mensaje'] .= "Por favor ingrese todos los datos necesarios.";
        $_SESSION['tipo_mensaje'] = 1;
        return $result;

    } else {
        return $result;
    }
}

// Función para validar que los datos necesarios en la edición de usuario (admin) no esté vacíos
function empty_update_admin($cedula, $userid, $pnombre, $papellido, $nacionalidad, $admin, $fechanac, $fechaing, $cargo, $dpto) {
    
    $result = false;

    if (empty($cedula) || empty($userid) || empty($pnombre) || empty($papellido) || (empty($nacionalidad) && $nacionalidad !="0") || (empty($admin) && $admin !="0") || empty($fechanac) || empty($fechaing) || empty($cargo) || empty($dpto)) {

        $result = true;
        $_SESSION['mensaje'] .= "Por favor ingrese todos los datos necesarios.";
        $_SESSION['tipo_mensaje'] = 1;
        return $result;

    } else {
        return $result;
    }
}

// Función para validar que el campo de búsqueda no esté vacío
function empty_search($cedula) {
    $result = false;

    if (empty($cedula)) {
        $result = true;
        $_SESSION['mensaje'] .= "Por favor ingrese todos los datos necesarios.";
        $_SESSION['tipo_mensaje'] = 1;
        return $result;
    } else {
        return $result;
    }
}

// Función para validar que los datos necesarios para agregar y editar usuarios (admin) no esté vacíos
function empty_admin($cedula, $clave, $userid, $pnombre, $papellido, $nacionalidad, $admin, $fechanac, $fechaing, $cargo, $dpto, $new) {
    
    $result = false;

    if (empty($cedula) || empty($userid) || (empty($clave) && $new) || empty($pnombre) || empty($papellido) || (empty($nacionalidad) && $nacionalidad !="0") || (empty($admin) && $admin !="0") || empty($fechanac) || empty($fechaing) || empty($cargo) || empty($dpto)) {

        $result = true;
        $_SESSION['mensaje'] .= "<br><br>Por favor ingrese todos los datos necesarios.";
        $_SESSION['tipo_mensaje'] = 1;
        return $result;

    } else {
        return $result;
    }
}

// Función para sanitizar userid
function sanitize_userid($userid)
{

    //Sanitizar y validar userid
    $sanitized = filter_var($userid, FILTER_SANITIZE_STRING);

    if (preg_match("~^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,12}$~",$sanitized)) {
        return $sanitized;
    } else {

        if ($_SERVER['PHP_SELF'] !== '/hidroven/functions/auth.php') {
            $_SESSION['mensaje'] .= "<br><br>Formato de usuario incorrecto.<br>• Sólo puede contener letras mayúsculas y minúsculas<br>• Longitud entre 3 y 12 caracteres";
            $_SESSION['tipo_mensaje'] = 1;
        }
        return $sanitized;
    }
}

// Función para sanitizar clave
function sanitize_clave($clave)
{

    // Sanitizar y validar clave
    $sanitized = filter_var($clave, FILTER_SANITIZE_STRING);

    if (preg_match('~^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[.,@$!%*?&ñÑ])[A-Za-z\d.,@$!%*?&ñÑ]{8,16}$~', $clave)) {
        return $sanitized;
    } else {

        if ($_SERVER['PHP_SELF'] !== '/hidroven/functions/auth.php') {
            $_SESSION['mensaje'] .= "<br><br>Formato de clave incorrecto. Debe cumplir con las siguientes características: <br>• Longitud entre 8 y 16 caracteres<br>• Tener al menos una letra mayúscula y una minúscula<br>• Debe contener al menos un dígito entre el 0 y el 9<br>• Debe contener al menos un caracter especial: <b>.,@$!%*?&</b>";
            $_SESSION['tipo_mensaje'] = 1;
        }
        return $sanitized;
    }
}

// Función para sanitizar cedula
function sanitize_cedula($cedula)
{

    // Sanitizar y validar cedula
    $sanitized = filter_var($cedula, FILTER_SANITIZE_STRING);

    if (ctype_digit($sanitized) && preg_match('~^(?=.*[0-9])[0-9]{1,8}$~', $cedula)) {
        return $sanitized;
    } else {
        $_SESSION['mensaje'] .= "<br><br>Formato de cédula incorrecto.<br>• Ingrese sólo dígitos entre el 0 y el 9, sin puntos<br>• Longitud máxima de 8 dígitos";
        $_SESSION['tipo_mensaje'] = 1;
        return $sanitized;
    }
}

// Función para sanitizar string alfabético
function sanitize_string($string, $field)
{
    // Sanitizar y validar nombre/apellido
    $sanitized = filter_var($string, FILTER_SANITIZE_STRING);

    if (preg_match("~^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s*]+$~",$sanitized)) {
        return $sanitized;
    } else if ($sanitized === '' && ($field === 'segundo nombre' || $field === 'segundo apellido')) {
        return $sanitized;
    } else {
        $_SESSION['mensaje'] .= "<br><br>Formato de " .$field ." incorrecto: " .$string ."<br>• Utilice sólo caracteres alfabéticos";
        $_SESSION['tipo_mensaje'] = 1;
        return $sanitized;
    }
}

// Función para sanitizar email
function sanitize_correo($correo)
{
    // Sanitizar y validar correo
    $sanitized = filter_var($correo, FILTER_SANITIZE_EMAIL);

    if (filter_var($sanitized, FILTER_VALIDATE_EMAIL)) {
        return $sanitized;
    } else {
        $_SESSION['mensaje'] .= "<br><br>Formato de correo incorrecto, ejemplo de formato válido: ejemplo@correo.com";
        $_SESSION['tipo_mensaje'] = 1;
        return $sanitized;
    }
}

// Función para sanitizar fechas
function sanitize_fecha($fecha)
{

    // Sanitizar y validar fechas
    $sanitized = preg_replace("([^0-9-])", "", $fecha);

    if (preg_match("~^(?=.*[0-9])(?=.*-)[0-9]{4}[-]{1}[0-9]{2}[-][0-9]{2}$~", $sanitized)) {
        return $sanitized;
    } else {
        $_SESSION['mensaje'] .= "<br><br>Formato de fecha incorrecto.";
        $_SESSION['tipo_mensaje'] = 1;
        return $sanitized;
    }
}

// Función para sanitizar teléfonos
function sanitize_telefono($telefono)
{

    // Sanitizar y validar número de teléfono/celular
    $sanitized = preg_replace("([^0-9])", "", $telefono);

    if (preg_match("~^(?=.*[0-9])[0-9]{11}$~", $sanitized)) {
        return $sanitized;
    } else {
        $_SESSION['mensaje'] .= "<br><br>Formato de número telefónico o celular incorrecto.<br>• Debe contener dígitos entre el 0 y el 9<br>• No debe contener guiones, parentesis o ningún otro caracter similar<br>• Debe ser tener 11 dígitos de longitud, incluyendo el código de área";
        $_SESSION['tipo_mensaje'] = 1;
        return $sanitized;
    }
}

// Función para sanitizar id de departamento
function sanitize_dpto($dpto)
{
    //Sanitizar y validar id de departamento
    $sanitized = filter_var($dpto, FILTER_SANITIZE_NUMBER_INT);

    if (preg_match('~^(?=.*[0-9])[0-9]{2}$~', $sanitized)) {
        return $sanitized;
    } else {
        $_SESSION['mensaje'] .= "<br><br>Formato de departamento incorrecto.";
        $_SESSION['tipo_mensaje'] = 1;
        return $sanitized;
    }
}

// Función para sanitizar números enteros
function sanitize_numero($numero)
{

    //Sanitizar y validar números enteros
    $sanitized = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);

    if (ctype_digit($sanitized)) {
        return $sanitized;
    } else {
        $_SESSION['mensaje'] .= "<br><br>Formato de número incorrecto.";
        $_SESSION['tipo_mensaje'] = 1;
        return $sanitized;
    }
}

?>