<!-- Función de autenticación de usuario -->

<?php

//Revisar si se llego mediante el método POST
if (isset($_POST["submit_login"])) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    //El usuario rellenó el formulario de login, sanitizar los datos ingresados
    $userid = sanitize_userid($_POST["Username"]);
    $clave = sanitize_clave($_POST["Password"]);
    $exist = user_login($conn, $userid, $clave);

    //Revisar si los campos están vacíos
    if (empty_login($userid, $clave) !== false) {
        // Algún campo está vacío
        include "../assets/alert.php";

    } else if ($exist == false) {
        // El usuario no está registrado y/o la clave es incorrecta
        include "../assets/alert.php";
    } else {
        // El usuario accedió exitosamente al sistema
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $userid;
    }
} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#Username, #Password").removeClass("input-error, input-success");

    var userEmpty = "<?php echo empty($userid); ?>"
    var passEmpty = "<?php echo empty($clave); ?>"
    var exist = "<?php echo $exist; ?>"

    if (userEmpty == true || exist == false) {
        $("#Username").addClass("input-error")
    } else {
        $("#Username").addClass("input-success")
    }

    if (passEmpty == true || exist == false) {
        $("#Password").addClass("input-error")
    } else {
        $("#Password").addClass("input-success")
    }

    if (userEmpty == false && passEmpty == false && exist == true) {
        location.replace("../php/index.php")
    }
</script>