<?php 

if (isset($_POST['submit_const'])) {

    session_start();
    include_once "./functions.php";

    $nombre = sanitize_string($_POST['nombre'], "nombre");
    $cedula = sanitize_cedula($_POST['cedula']);
    $fecha = sanitize_fecha($_POST['fechaing']);
    $dpto = sanitize_string($_POST['dpto'], "departamento");
    $cargo = sanitize_string($_POST['cargo'], "cargo");
    $salario = $_POST['salario'];
    setlocale(LC_TIME, "es_VE");
    $dia = strftime("%d");
    $mes = strftime("%B");
    $año = strftime("%Y");

    echo "<b>CONSTANCIA DE TRABAJO</b> <br><br>
    <p>Quien suscribe, por medio de la presente hace constar que el ciudadano <b>${nombre}</b>, titular de la cédula de identidad <b>Nº V-.${cedula}</b>, presta sus servicios en esta Empresa desde <b>${fecha}</b>, adscrito a la <b>${dpto}</b>, desempeñando el cargo de <b>${cargo}</b>, devengado a una remuneración mensual de <b>Bs. ${salario}</b>.</p> <br>
    <p>Constancia que se expide a petición de la parte interesada en la ciudad de Caracas a los ${dia} días del mes de ${mes} de ${año}.</p>";

} else {
    // Se llegó mediante un método inusual
    header("location: index.php");
    exit();
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

</script>