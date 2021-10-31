<?php
    
if (isset($_POST['submit_const'])) {

    session_start();
    date_default_timezone_set("America/Caracas");
    include_once "./functions.php";

    $nombre = sanitize_string($_POST['nombre'], "nombre");
    $cedula = sanitize_cedula($_POST['cedula']);
    $fecha = date_format(date_create(sanitize_fecha($_POST['fechaing'])), "d/m/Y");
    $dpto = sanitize_string($_POST['dpto'], "departamento");
    $cargo = sanitize_string($_POST['cargo'], "cargo");
    $salario = number_format($_POST['salario'], 2, ",", ".");

    $dia = strftime("%d");
    $mes = strftime("%m");

    switch ($mes) {
        case "01":
            $mes = "enero";
            break;
        case "02":
            $mes = "febrero";
            break;
        case "03":
            $mes = "marzo";
            break;
        case "04":
            $mes = "abril";
            break;
        case "05":
            $mes = "mayo";
            break;
        case "06":
            $mes = "junio";
            break;
        case "07":
            $mes = "julio";
            break;
        case "08":
            $mes = "agosto";
            break;
        case "09":
            $mes = "septiembre";
            break;
        case "10":
            $mes = "octubre";
            break;
        case "11":
            $mes = "noviembre";
            break;
        case "12":
            $mes = "diciembre";
            break;
        default:
            $mes = "error al cargar el mes";
    }

    $año = strftime("%Y");

    $plantilla = "
    <div id='const' class='container constancia'>
        <div class='row d-flex flex-row justify-content-around'>
            <div class='container-fluid d-flex col justify-content-start'><image src='../img/hidroven.png'></div>
            <div class='container-fluid d-flex col justify-content-end'><image src='../img/200años.png'></div>
        </div>
        <br>
        <br>
        <div class='row'>
            <div class='col-sm-12 text-center'>
                <b>CONSTANCIA DE TRABAJO</b>
            </div>
        </div>
        <br><br>
        <div class='row'>
            <div class='col-sm-12'>
                Quien suscribe, por medio de la presente hace constar que el ciudadano <b>${nombre}</b>, titular de la cédula de identidad <b>Nº V-.${cedula}</b>, presta sus servicios en esta Empresa desde <b>${fecha}</b>, adscrito a la <b>${dpto}</b>, desempeñando el cargo de <b>${cargo}</b>, devengado a una remuneración mensual de <b>Bs. ${salario}</b>.
            </div>
        </div>
        <br>
        <div class='row'>
            <div class='col-sm-12'>
                Constancia que se expide a petición de la parte interesada en la ciudad de Caracas a los ${dia} días del mes de ${mes} de ${año}.
            </div>
        </div>
        <br><br>
        <div class class='row'>
            <div class='col-sm-12 text-center'>
                Atentamente,
            </div>
        </div>
        <br><br>
        <div class='row'>
            <div class='col-sm-12 text-center'>
                <b>MÓNICA GABRIELA UTRERA LUJAN</b>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-12 text-center'>
                Gerente General de Talento
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-12 text-center'>
                Designada mediante punto de cuenta nº 074 de fecha 20/09/2021
            </div>
        </div>
        <br><br><br>
        <div class='row'>
            <div class='col-sm-12'>    
                YA.-
            </div>
        </div>
        <br>
        <div class='row mt-auto'>
            <div class='col-sm-12 text-center'>
                Urb. Chacao, calle Pantin, Edificio HIDROVEN, C.A. Municipio Chacao, Parroquia Chacao, estado Miranda, Caracas - República Bolivariana de Venezuela
            </div>
        </div>
    </div>
    <br>";

    echo $plantilla ."
        <div class='d-flex justify-content-center'>
            <input id='imprimir' name='imprimir' class='btn btn-primary my-3' type='button' value='Imprimir' onclick='printDiv();'>
        </div>";
} else {
    // Se llegó mediante un método inusual
    header("location: index.php");
    exit();
}
?>