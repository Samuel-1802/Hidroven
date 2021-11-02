<?php

if ($_POST['confirm_clave'] == "" && $_POST['n_clave'] !== "") {

    $_SESSION['mensaje'] = "Por favor repita su  nueva clave para confirmar el cambio";
    $_SESSION['tipo_mensaje'] = 1;
    include "../assets/alert.php";

} else if ($_POST['confirm_clave'] !== $_POST['n_clave']) {

    $_SESSION['mensaje'] = "Las claves ingresadas no son iguales";
    $_SESSION['tipo_mensaje'] = 1;
    include "../assets/alert.php";

}

?>