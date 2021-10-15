<!-- Función para buscar un usuario en la base de datos por ci -->

<?php

if (isset($_POST["submit_buscar"])) {

    session_start();
    include_once './functions.php';
    include_once "./sql_queries.php";

    // Sanitizar datos ingresados
    $cedula = sanitize_cedula($_POST['ci']);
    $success = false;

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])) {
        // Alguna validación encontró un error
        include "../assets/alert.php";
    } else if (empty_search($cedula) !== false) {
        // Algún campo está vacío
        include "../assets/alert.php";
    } else {

        $searchResult = search_user($conn, $cedula);

        if ($_SESSION['s_success'] == true) {
            $_SESSION['search_userid'] = $searchResult['userid'];
            $success = true;
            unset($_SESSION['s_success']);
        } else {
            $success = false;
            unset($_SESSION['s_success']);
        }

        include "../assets/alert.php";
    }
} else {
    // Se llegó mediante un método inusual, regresar al index
    header("location: ../php/index.php");
    exit();
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#ci").removeClass("input-error");
    $("#ci").removeClass("input-success");

    var ciEmpty = "<?php echo empty($cedula) ?>";

    var ci = "<?php echo $cedula; ?>";

    var success = "<?php echo $success; ?>";

    var regExCedula = new RegExp(/^[0-9]{1,8}$/);

    if (success == true) {
        $("#ci").removeClass("input-error");
        $("#ci").removeClass("input-success");
    } else {
        if (ciEmpty == true) {
            $("#ci").addClass("input-error");
        } else {
            if (regExCedula.test(ci)) {
                $("#ci").addClass("input-success");
            } else {
                $("#ci").addClass("input-error");
            }
        }
    }
</script>