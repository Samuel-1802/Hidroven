<!-- Función para actualizar datos de usuario (no admin) -->

<?php

if (isset($_POST['submit_edit'])) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    //El usuario rellenó el formulario, sanitizar los datos ingresados
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
    $cedula = sanitize_cedula($_POST['cedula']);
    $userid = sanitize_userid($_POST['userid']);
    $success = false;

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])) {
        // Alguna validación encontró un error
        include "../assets/alert.php";
    } else if (empty_update_noadmin($pnombre, $papellido) !== false) {
        // Algún campo está vacío
        include "../assets/alert.php";
    } else {

        // Hacer una copia del usuario en la BD
        temp_copy($conn, $userid);

        // Revisar que la cédula o el nombre de usuario no se repitan
        if (user_exists($conn, $cedula, $userid, $userid, $cedula) !== false) {
            // Redireccionar
            include "../assets/alert.php";
        } else {

            // Actualizar los datos en la BD
            update_user($conn, $cedula, $hash, $pnombre, $snombre, $papellido, $sapellido);

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
    $("#np_nombre, #ns_nombre, #np_apellido, #ns_apellido, #n_clave, #confirm_clave").removeClass("input-error");
    $("#np_nombre, #ns_nombre, #np_apellido, #ns_apellido, #n_clave, #confirm_clave").removeClass("input-success");

    var nombreEmpty = "<?php echo empty($pnombre); ?>";
    var apellidoEmpty = "<?php echo empty($papellido); ?>";
    var pnombre = "<?php echo $pnombre; ?>";
    var snombre = "<?php echo $snombre; ?>";
    var papellido = "<?php echo $papellido; ?>";
    var sapellido = "<?php echo $sapellido; ?>";
    var clave = "<?php echo $clave; ?>";
    var success = "<?php echo $success; ?>";
    var regEx1 = new RegExp(/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/);
    var regEx2 = new RegExp(/^(?=.*[0-9])(?=.*[.,@$!%*?&])[a-zA-Z0-9.,@$!%*?&]{8,16}$/);
    var regEx3 = new RegExp(/^$|^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/);

    if (success == true) {
        $("#np_nombre, #ns_nombre, #np_apellido, #ns_apellido, #n_clave").removeClass("input-error");
        $("#np_nombre, #ns_nombre, #np_apellido, #ns_apellido, #n_clave").removeClass("input-success");
    } else {
        if (nombreEmpty == true) {
            $("#np_nombre").addClass("input-error");
        } else {
            $("#np_nombre").addClass("input-success");
        }

        if (apellidoEmpty == true) {
            $("#np_apellido").addClass("input-error");
        } else {
            $("#np_apellido").addClass("input-success");
        }

        if (regEx1.test(pnombre)) {
            $("#np_nombre").removeClass("input-error, input-success");
            $("#np_nombre").addClass("input-success");
        } else {
            $("#np_nombre").removeClass("input-error, input-success");
            $("#np_nombre").addClass("input-error");
        }

        if (regEx3.test(snombre)) {
            $("#ns_nombre").addClass("input-success");
        } else {
            $("#ns_nombre").addClass("input-error");
        }

        if (regEx1.test(papellido)) {
            $("#np_apellido").removeClass("input-error, input-success");
            $("#np_apellido").addClass("input-success");
        } else {
            $("#np_apellido").removeClass("input-error, input-success");
            $("#np_apellido").addClass("input-error");
        }

        if (regEx3.test(sapellido)) {
            $("#ns_apellido").addClass("input-success");
        } else {
            $("#ns_apellido").addClass("input-error");
        }

        if (regEx2.test(clave) || clave == "") {
            $("#n_clave").addClass("input-success");
        } else {
            $("#n_clave").addClass("input-error");
        }

        var form = document.getElementById("editar");
        var elements = form.elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            elements[i].readOnly = false;
        }

        $("#submit_edit").prop("disabled", false);
    }
</script>