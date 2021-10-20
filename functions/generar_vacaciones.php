<?php

if (isset($_POST['submit_vac'])) {

    session_start();
    include_once "./functions.php";

    $nombre = sanitize_string($_POST['nombre'], "nombre");
    $cedula = sanitize_cedula($_POST['cedula']);
    $fecha = date_format(date_create(sanitize_fecha($_POST['fechaing'])), "d/m/Y");
    $dpto = sanitize_string($_POST['dpto'], "departamento");
    $cargo = sanitize_string($_POST['cargo'], "cargo");
    $salario = $_POST['salario'];
    $fechavac1 = date_format(date_create(sanitize_fecha($_POST['fechavac1'])), "d/m/Y");
    $fechavac2 = date_format(date_create(sanitize_fecha($_POST['fechavac2'])), "d/m/Y");
    $fecha = date("d-m-Y");
    $dia = strftime("%d");
    $mes = strftime("%m");
    $año = strftime("%Y");

    echo "<div>
    <table>
        <tr>
            <th>GERENCIA GENERAL DE TALENTO HUMANO VACACIONES PERSONAL EMPLEADO</th>
        </tr>
        <tr>
            <th>DATOS DEL TRABAJADOR</th>
            <td>
            <tr>
                <th>Nº</th>
                <td></td>
                </tr>
                <tr>
                <th>FECHA</th>
                <td>${fecha}</td>
                </tr>
            </td></tr>
        </tr>
    </table>
    </div>
    
    <div class='d-flex justify-content-center'>
        <button id='imprimir' name='imprimir' type='submit' class='btn btn-primary my-3'>Imprimir</button>
    </div>";
} else {
    // Se llegó mediante un método inusual
    header("location: index.php");
    exit();
}
?>

