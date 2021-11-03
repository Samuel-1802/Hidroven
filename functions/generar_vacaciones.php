<?php

if (isset($_POST['submit_vac'])) {

    session_start();
    include_once "./functions.php";

    $nombre = sanitize_string($_POST['nombre'], "nombre");
    $cedula = sanitize_cedula($_POST['cedula']);
    $fechaing = date_format(date_create(sanitize_fecha($_POST['fechaing'])), "d/m/Y");
    $dpto = sanitize_string($_POST['dpto'], "departamento");
    $cargo = sanitize_string($_POST['cargo'], "cargo");
    $salario = $_POST['salario'];
    $fechavac1 = date_format(date_create(sanitize_fecha($_POST['fechavac1'])), "d/m/Y");
    $fechavac2 = date_format(date_create(sanitize_fecha($_POST['fechavac2'])), "d/m/Y");
    $fecha = date("d/m/Y");
    $mod = strtotime("+1 year");
    $año = strftime("%Y");
    $año2 = strftime("%Y", $mod);

    //Calcular tiempo de servicio
    $ingreso = strtotime($_POST['fechaing']);
    $now = time();
    $timedif = ($now - $ingreso) / (60*60*24);

    $años = floor($timedif/365);
    $meses = floor(($timedif*12/365) - ($años*12));
    $dias = floor($timedif - ($meses * 30) - ($años * 365));

    echo "<div class='table-responsive text-center' name='vacaciones' id='vacaciones'>
    <table class='table table-bordered text-center'>
    <col width='12.5%'>
    <col width='12.5%'>
    <col width='12.5%'>
    <col width='12.5%'>
    <col width='12.5%'>
    <col width='12.5%'>
    <col width='12.5%'>
    <col width='12.5%'>
    <tbody>
        <tr scope='row'>
            <th colspan='6'>GERENCIA GENERAL DE TALENTO HUMANO<br>VACACIONES PERSONAL EMPLEADO</th>
            <th colspan='2'><img src='../img/logo-hidroven.png' class='img-fluid'></th>
        </tr>

        <tr scope='row'>
            <td colspan='6'><b>DATOS DEL TRABAJADOR</b></td>
            <td><b>Nº</b></td>
            <td></td>
        </tr>
        <tr scope='row'>
            <td colspan='6'></td>
            <td><b>FECHA</b></td>
            <td>${fecha}</td>
        </tr>
        <tr scope='row'>
            <td colspan='6'><b>APELLIDOS Y NOMBRES</b></td>
            <td colspan='2'><b>CÉDULA</b></td>
        </tr>
        <tr scope='row'>
            <td colspan='6'>${nombre}</td>
            <td colspan='2'>${cedula}</td>
        </tr>
        <tr scope='row'>
            <td colspan='4'><b>CARGO</b></td>
            <td colspan='4'><b>UBICACIÓN ADMINISTRATIVA</b></td>
        </tr>
        <tr>
            <td colspan='4'>${cargo}</td>
            <td colspan='4'>${dpto}</td>
        </tr>
        <tr>
            <td rowspan='2'><b>FECHA DE INGRESO</b></td>
            <td colspan='3'><b>TIEMPO DE SERVICIO</b></td>
            <td rowspan='2'><b>DÍAS DE REPOSO</b></td>
            <td colspan='3'><b>VENCIMIENTO</b></td>
        </tr>
        <tr>
            <td><b>AÑOS</b></td>
            <td><b>MESES</b></td>
            <td><b>DÍAS</b></td>
            <td><b>D</b></td>
            <td><b>M</b></td>
            <td><b>A</b></td>
        </tr>
        <tr>
            <td>${fechaing}</td>
            <td>${años}</td>
            <td>${meses}</td>
            <td>${dias}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan='2'><b>PERIODO VACACIONAL</b></td>
            <td colspan='2'><b>DÍAS OTORGADOS A CTA. DE VACACIONES</b></td>
            <td><b>DÍAS PENDIENTES</b></td>
            <td><b>DÍAS A DISFRUTAR</b></td>
            <td colspan='2'><b>SUELDO + PRIMAS</b></td>
        </tr>
        <tr>
            <td colspan='2'>${año} - ${año2}</td>
            <td colspan='2'></td>
            <td></td>
            <td></td>
            <td colspan='2'>${salario}</td>
        </tr>
        <tr>
            <td rowspan='2'><b>DÍAS A BONIFICAR</b></td>
            <td rowspan='2'><b>BONO VACACIONAL</b></td>
            <td rowspan='2'><b>BONO POST VACACIONAL</b></td>
            <td rowspan='2'><b>ADELANTO DE QUINCENA</b></td>
            <td colspan='4'><b>LAPSO DE VACACIONES</b></td>
        </tr>
        <tr>
            <td colspan='2'><b>SALIDA</b></td>
            <td colspan='2'><b>REGRESO</b></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan='2'>${fechavac1}</td>
            <td colspan='2'>${fechavac2}</td>
        </tr>
        <tr>
            <td colspan='8'><b>SUSPENSIÓN O POSTERGACIÓN DE VACACIONES</b></td>
        </tr>
        <tr>
            <td colspan='8' class='text-start'><b>OBSERVACIONES:</b><br><br><br></td>
        </tr>
        <tr>
            <td colspan='3'><b>APROBADO POR</b></td>
            <td colspan='3'><b>AUTORIZADO POR</b></td>
            <td colspan='2'><b>FIRMA DEL EMPLEADO</b></td>
        </tr>
        <tr>
            <td colspan='3'></td>
            <td colspan='3'><br><br><b>GERENTE GENERAL DE TALENTO HUMANO</b></td>
            <td colspan='2'></td>
        </tr>
    </tbody>
</table></div>
    
    <div class='d-flex justify-content-center'>
        <input id='imprimir' name='imprimir' class='btn btn-primary my-3' type='button' value='Imprimir' onclick='printDiv();'>
    </div>";
} else {
    // Se llegó mediante un método inusual
    header("location: index.php");
    exit();
}
?>

