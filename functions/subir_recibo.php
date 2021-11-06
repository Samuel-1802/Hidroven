<?php

if (isset($_POST['submit_recibo'])) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    $usuario = $_POST['usuario'];
    $ingreso = $_POST['ingreso'];
    $sso = $_POST['sso'];
    $lrpe = $_POST['lrpe'];
    $faov = $_POST['faov'];
    $mes = $_POST['mes'];
    $success = false;

    if ($ingreso > 0 && $sso > 0 && $lrpe > 0 && $faov > 0 && $usuario != "" && $mes != "") {
        new_recibo($usuario, $ingreso, $sso, $lrpe, $faov, $mes);
        $success = true;
        echo "<div class='alert alert-success text-center'>Recibo subido con éxito</div>";
    } else {

        echo "<div class='alert alert-danger text-center'>Error al subir el recibo</div>";
    }
} else {
    header('location: ../php/index.php');
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var success = "<?php echo $success; ?>";


    if (success == true) {
        $('input').removeClass('input-error');
        $('input').val('');
    } else {
        $('input').addClass('input-error');
    }
</script>