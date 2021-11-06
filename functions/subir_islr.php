<?php

if (isset($_POST['submit_islr'])) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    $usuario = $_POST['usuario'];
    $ingreso = $_POST['ingreso'];
    $deduc = $_POST['deduc'];
    $success = false;

    if ($ingreso > 0 && $deduc > 0 && $usuario != "") {
        new_islr($usuario, $ingreso, $deduc);
        $success = true;
        echo "<div class='alert alert-success text-center'>ISLR subido con éxito</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error al subir el ISLR</div>";
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