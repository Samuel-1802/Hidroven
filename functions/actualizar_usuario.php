<!-- Función para actualizar datos de usuario (admin) -->

<?php
if (isset($_POST["submit_edit"])) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    //El usuario rellenó el formulario, sanitizar los datos ingresados
    $cedula = sanitize_cedula($_POST['n_cedula']);
    $userid = sanitize_userid($_POST['n_userid']);

    if (!empty($_POST['n_clave'])) {
        $clave = sanitize_clave($_POST['n_clave']);
        //pasar la clave a hash
        $hash = password_hash($clave, PASSWORD_DEFAULT);
    } else {
        $clave = "";
        $hash = "";
    }

    $pnombre = sanitize_string($_POST['np_nombre'], "primer nombre");
    $snombre = sanitize_string($_POST['ns_nombre'], "segundo nombre");
    $papellido = sanitize_string($_POST['np_apellido'], "primer apellido");
    $sapellido = sanitize_string($_POST['ns_apellido'], "segundo apellido");
    $nacionalidad = sanitize_numero($_POST['n_nacionalidad']);
    $admin = sanitize_numero($_POST['n_admin']);
    $fechanac = sanitize_fecha($_POST['n_fechanac']);
    $fechaing = sanitize_fecha($_POST['n_fechaing']);
    $cargo = sanitize_string($_POST['n_cargo'], "cargo");
    $dpto = sanitize_dpto($_POST['n_departamento']);
    $ogcedula = sanitize_cedula($_POST['cedula']);
    $oguserid = sanitize_userid($_POST['userid']);
    $success = false;
    $exists = user_exists($conn, $cedula, $userid, $oguserid, $ogcedula);

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])) {
        // Alguna validación encontró un error
        include "../assets/alert.php";
    } else if (empty_update_admin($cedula, $userid, $pnombre, $papellido, $nacionalidad, $admin, $fechanac, $fechaing, $cargo, $dpto) !== false) {
        // Algún campo está vacío
        include "../assets/alert.php";
    } else {

        // Hacer una copia del usuario en la BD
        temp_copy($conn, $oguserid);

        // Revisar que la cédula o el nombre de usuario no se repitan
        if ($exists !== false) {
            // Redireccionar
            include "../assets/alert.php";
        } else {

            // Actualizar los datos en la BD
            update_user_admin($conn, $cedula, $userid, $hash, $pnombre, $snombre, $papellido, $sapellido, $nacionalidad, $admin, $fechanac, $fechaing, $cargo, $dpto, $oguserid);

            $_SESSION['mensaje'] = "Datos actualizados exitosamente.";
            $_SESSION['tipo_mensaje'] = 0;
            $success = true;

            include "../assets/alert.php";
        }
    }
} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
    exit();
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#np_nombre, #ns_nombre, #np_apellido, #ns_apellido, #n_clave, #n_userid, #n_cedula, #n_nacionalidad, #n_admin, #n_fechanac, #n_fechaing, #n_cargo, #n_departamento").removeClass("input-error");
    $("#np_nombre, #ns_nombre, #np_apellido, #ns_apellido, #n_clave, #n_userid, #n_cedula, #n_nacionalidad, #n_admin, #n_fechanac, #n_fechaing, #n_cargo, #n_departamento").removeClass("input-success");

    var nombreEmpty = "<?php echo empty($pnombre); ?>";
    var apellidoEmpty = "<?php echo empty($papellido); ?>";
    var useridEmpty = "<?php echo empty($userid); ?>";
    var cedulaEmpty = "<?php echo empty($cedula); ?>";
    var nacionalidadEmpty = "<?php echo empty($nacionalidad); ?>";
    var adminEmpty = "<?php echo empty($admin); ?>";
    var fechanacEmpty = "<?php echo empty($fechanac); ?>";
    var fechaingEmpty = "<?php echo empty($fechaing); ?>";
    var cargoEmpty = "<?php echo empty($cargo); ?>";
    var dptoEmpty = "<?php echo empty($dpto); ?>";

    var pnombre = "<?php echo $pnombre; ?>";
    var snombre = "<?php echo $snombre; ?>";
    var papellido = "<?php echo $papellido; ?>";
    var sapellido = "<?php echo $sapellido; ?>";
    var userid = "<?php echo $userid; ?>";
    var clave = "<?php echo $clave; ?>";
    var cedula = "<?php echo $cedula; ?>";
    var nacionalidad = "<?php echo $nacionalidad; ?>";
    var admin = "<?php echo $admin; ?>";
    var fechanac = "<?php echo $fechanac; ?>";
    var fechaing = "<?php echo $fechaing; ?>";
    var cargo = "<?php echo $cargo; ?>";
    var dpto = "<?php echo $dpto; ?>";

    var success = "<?php echo $success; ?>";
    var exists = "<?php echo $exists; ?>";

    var regExNombre = new RegExp(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,25}$/);
    var regExCargo = new RegExp(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,60}$/);
    var regExClave = new RegExp(/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[.,@$!%*?&])[a-zA-Z0-9.,@$!%*?&]{8,16}$/);
    var regExUserid = new RegExp(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]{3,12}$/);
    var regExFecha = new RegExp(/^\d{4}[-]\d{2}[-]\d{2}$/);
    var regExBool = new RegExp(/^[0-1]{1}$/);
    var regExDpto = new RegExp(/^[0-9]{2}$/);
    var regExCedula = new RegExp(/^[0-9]{1,8}$/);

    if (success == true) {
        $("#np_nombre, #ns_nombre, #np_apellido, #ns_apellido, #n_clave, #n_userid, #n_cedula, #n_nacionalidad, #n_admin, #n_fechanac, #n_fechaing, #n_cargo, #n_departamento").removeClass("input-error");
        $("#np_nombre, #ns_nombre, #np_apellido, #ns_apellido, #n_clave, #n_userid, #n_cedula, #n_nacionalidad, #n_admin, #n_fechanac, #n_fechaing, #n_cargo, #n_departamento").removeClass("input-success");
    } else if (exists == false) {
        if (nombreEmpty == true) {
            $("#np_nombre").addClass("input-error");
        } else {
            if (regExNombre.test(pnombre)) {
                $("#np_nombre").addClass("input-success");
            } else {
                $("#np_nombre").addClass("input-error");
            }
        }

        if (apellidoEmpty == true) {
            $("#np_apellido").addClass("input-error");
        } else {
            if (regExNombre.test(papellido)) {
                $("#np_apellido").addClass("input-success");
            } else {
                $("#np_apellido").addClass("input-error");
            }
        }


        if (regExClave.test(clave) || clave == "") {
            $("#n_clave").addClass("input-success");
        } else {
            $("#n_clave").addClass("input-error");
        }

        if (useridEmpty == true) {
            $("#n_userid").addClass("input-error");
        } else {
            if (regExUserid.test(userid)) {
                $("#n_userid").addClass("input-success");
            } else {
                $("#n_userid").addClass("input-error");
            }
        }

        if (cedulaEmpty == true) {
            $("#n_cedula").addClass("input-error");
        } else {
            if (regExCedula.test(cedula)) {
                $("#n_cedula").addClass("input-success");
            } else {
                $("#n_cedula").addClass("input-error");
            }
        }

        if (adminEmpty == true) {
            $("#n_admin").addClass("input-error");
        } else {
            if (regExBool.test(admin)) {
                $("#n_admin").addClass("input-success");
            } else {
                $("#n_admin").addClass("input-error");
            }
        }

        if (nacionalidadEmpty == true) {
            $("#n_nacionalidad").addClass("input-error");
        } else {
            if (regExBool.test(nacionalidad)) {
                $("#n_nacionalidad").addClass("input-success");
            } else {
                $("#n_nacionalidad").addClass("input-error");
            }
        }

        if (fechaingEmpty == true) {
            $("#n_fechaing").addClass("input-error");
        } else {
            if (regExFecha.test(fechaing)) {
                $("#n_fechaing").addClass("input-success");
            } else {
                $("#n_fechaing").addClass("input-error");
            }
        }

        if (fechanacEmpty == true) {
            $("#n_fechanac").addClass("input-error");
        } else {
            if (regExFecha.test(fechanac)) {
                $("#n_fechanac").addClass("input-success");
            } else {
                $("#n_fechanac").addClass("input-error");
            }
        }

        if (cargoEmpty == true) {
            $("#n_cargo").addClass("input-error");
        } else {
            if (regExCargo.test(cargo)) {
                $("#n_cargo").addClass("input-success");
            } else {
                $("#n_cargo").addClass("input-error");
            }
        }

        if (dptoEmpty == true) {
            $("#n_dpto").addClass("input-error");
        } else {
            if (regExDpto.test(dpto)) {
                $("#n_departamento").addClass("input-success");
            } else {
                $("#n_departamento").addClass("input-error");
            }
        }

        if (regExNombre.test(snombre)) {
            $("#ns_nombre").addClass("input-success");
        } else {
            $("#ns_nombre").addClass("input-error");
        }

        if (regExNombre.test(sapellido)) {
            $("#ns_apellido").addClass("input-success");
        } else {
            $("#ns_apellido").addClass("input-error");
        }
    } else {
        if (nombreEmpty == true) {
            $("#np_nombre").addClass("input-error");
        } else {
            if (regExNombre.test(pnombre)) {
                $("#np_nombre").addClass("input-success");
            } else {
                $("#np_nombre").addClass("input-error");
            }
        }

        if (apellidoEmpty == true) {
            $("#np_apellido").addClass("input-error");
        } else {
            if (regExNombre.test(papellido)) {
                $("#np_apellido").addClass("input-success");
            } else {
                $("#np_apellido").addClass("input-error");
            }
        }

        if (regExClave.test(clave) || clave == "") {
            $("#n_clave").addClass("input-success");
        } else {
            $("#n_clave").addClass("input-error");
        }

        $("#n_userid").addClass("input-error");

        $("#n_cedula").addClass("input-error");

        if (adminEmpty == true) {
            $("#n_admin").addClass("input-error");
        } else {
            if (regExBool.test(admin)) {
                $("#n_admin").addClass("input-success");
            } else {
                $("#n_admin").addClass("input-error");
            }
        }

        if (nacionalidadEmpty == true) {
            $("#n_nacionalidad").addClass("input-error");
        } else {
            if (regExBool.test(nacionalidad)) {
                $("#n_nacionalidad").addClass("input-success");
            } else {
                $("#n_nacionalidad").addClass("input-error");
            }
        }

        if (fechaingEmpty == true) {
            $("#n_fechaing").addClass("input-error");
        } else {
            if (regExFecha.test(fechaing)) {
                $("#n_fechaing").addClass("input-success");
            } else {
                $("#n_fechaing").addClass("input-error");
            }
        }

        if (fechanacEmpty == true) {
            $("#n_fechanac").addClass("input-error");
        } else {
            if (regExFecha.test(fechanac)) {
                $("#n_fechanac").addClass("input-success");
            } else {
                $("#n_fechanac").addClass("input-error");
            }
        }

        if (cargoEmpty == true) {
            $("#n_cargo").addClass("input-error");
        } else {
            if (regExCargo.test(cargo)) {
                $("#n_cargo").addClass("input-success");
            } else {
                $("#n_cargo").addClass("input-error");
            }
        }

        if (dptoEmpty == true) {
            $("#n_dpto").addClass("input-error");
        } else {
            if (regExDpto.test(dpto)) {
                $("#n_departamento").addClass("input-success");
            } else {
                $("#n_departamento").addClass("input-error");
            }
        }

        if (regExNombre.test(snombre)) {
            $("#ns_nombre").addClass("input-success");
        } else {
            $("#ns_nombre").addClass("input-error");
        }

        if (regExNombre.test(sapellido)) {
            $("#ns_apellido").addClass("input-success");
        } else {
            $("#ns_apellido").addClass("input-error");
        }
    }
</script>