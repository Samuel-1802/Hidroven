<!-- Funciones de la intranet -->
<?php

    session_start();
    include_once "./connection.php";

    // Función para validar que los datos en el login no estén vacíos
    function empty_login($userid, $clave) {
        
        $result = false;

        if (empty($userid) || empty($clave)) {

            $result = true;
            $_SESSION['mensaje'] .= "<br> Por favor ingrese usuario y clave.";
            $_SESSION['tipo_mensaje'] = 1;
            return $result;

        } else {
            $result = false;
            return $result;
        }

    }

    // Función para sanitizar userid
    function sanitize_userid($userid) {

        //Sanitizar y validar userid
        $sanitized = filter_var($userid, FILTER_SANITIZE_STRING);
        
        if (ctype_alpha($sanitized)) {
            return $sanitized;
        } else {

            if ($_SERVER['PHP_SELF'] !== '/hidroven/functions/auth.php') {
                $_SESSION['mensaje'] .= "<br> Formato de usuario incorrecto.";
                $_SESSION['tipo_mensaje'] = 1;
            }
            return $sanitized;
        }

    }

    // Función para sanitizar clave
    function sanitize_clave($clave) {

        // Sanitizar y validar clave
        $sanitized = filter_var($clave, FILTER_SANITIZE_STRING);

        if(preg_match('~^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[.,@$!%*?&])[A-Za-z\d.,@$!%*?&]{8,16}$~', $clave)) {
            return $sanitized;
        } else {
            
            if ($_SERVER['PHP_SELF'] !== '/hidroven/functions/auth.php') {
                $_SESSION['mensaje'] .= "<br> Formato de clave incorrecto.";
                $_SESSION['tipo_mensaje'] = 1;
            }
            return $sanitized;
        }
    }

    // Función para sanitizar cedula
    function sanitize_cedula($cedula) {
        
        // Sanitizar y validar cedula
        $sanitized = filter_var($cedula, FILTER_SANITIZE_STRING);

        if (ctype_digit($sanitized)) {
            return $sanitized;
        } else {
            $_SESSION['mensaje'] .= "<br> Formato de cédula incorrecto.";
            $_SESSION['tipo_mensaje'] = 1;
            return $sanitized;
        }
    }

    // Función para sanitizar nombre/apellido
    function sanitize_nombre($nombre) {
        
        // Sanitizar y validar nombre/apellido
        $sanitized = filter_var($nombre, FILTER_SANITIZE_STRING);

        if (ctype_alpha($sanitized)) {
            return $sanitized;
        } else {
            $_SESSION['mensaje'] .= "<br> Formato de nombre o apellido incorrecto.";
            $_SESSION['tipo_mensaje'] = 1;
            return $sanitized;
        }
    }

    // Función para sanitizar email
    function sanitize_correo($correo) {

        // Sanitizar y validar correo
        $sanitized = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if (filter_var($sanitized, FILTER_VALIDATE_EMAIL)) {
            return $sanitized;
        } else {
            $_SESSION['mensaje'] .= "<br> Formato de correo incorrecto.";
            $_SESSION['tipo_mensaje'] = 1;
            return $sanitized;
        }

    }

    // Función para sanitizar fechas
    function sanitize_fecha($fecha) {

        // Sanitizar y validar fechas
        $sanitized = preg_replace("([^0-9-])", "", $fecha);

        if (preg_match("~^(?=.*[0-9])(?=.*-)[0-9]{4}[-]{1}[0-9]{2}[-][0-9]{2}$~", $sanitized)) {
            return $sanitized;
        } else {
            $_SESSION['mensaje'] .= "<br> Formato de fecha incorrecto.";
            $_SESSION['tipo_mensaje'] = 1;
            return $sanitized;
        }
    }

    // Función para sanitizar teléfonos
    function sanitize_telefono($telefono) {

        // Sanitizar y validar número de teléfono/celular
        $sanitized = preg_replace("([^0-9])", "", $telefono);

        if (preg_match("~^(?=.*[0-9])[0-9]{11}$~", $sanitized)) {
            return $sanitized;
        } else {
            $_SESSION['mensaje'] .= "<br> Formato de número telefónico o celular incorrecto.";
            $_SESSION['tipo_mensaje'] = 1;
            return $sanitized;
        }
    }

    // Función para sanitizar números enteros
    function sanitize_numero($numero) {

        //Sanitizar y validar números enteros
        $sanitized = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);

        if (filter_var($sanitized, FILTER_VALIDATE_INT)) {
            return $sanitized;
        } else {
            $_SESSION['mensaje'] .= "<br> Formato de número incorrecto.";
            $_SESSION['tipo_mensaje'] = 1;
            return $sanitized;
        }
    }

?>