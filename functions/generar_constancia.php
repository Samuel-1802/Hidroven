<?php

if (isset($_POST['submit_const'])) {

    session_start();
    include_once "./functions.php";

    $nombre = sanitize_string($_POST['nombre'], "nombre");
    $cedula = sanitize_cedula($_POST['cedula']);
    $fecha = date_format(date_create(sanitize_fecha($_POST['fechaing'])), "d/m/Y");
    $dpto = sanitize_string($_POST['dpto'], "departamento");
    $cargo = sanitize_string($_POST['cargo'], "cargo");
    $salario = number_format($_POST['salario'], 2, ",", ".");
    setlocale(LC_TIME, "es_VE");
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

    echo "<div class='row'>
    <p class='text-center'><b>CONSTANCIA DE TRABAJO</b></p> <br><br>
    <p class='text-center'>Quien suscribe, por medio de la presente hace constar que el ciudadano <b>${nombre}</b>, titular de la cédula de identidad <b>Nº V-.${cedula}</b>, presta sus servicios en esta Empresa desde <b>${fecha}</b>, adscrito a la <b>${dpto}</b>, desempeñando el cargo de <b>${cargo}</b>, devengado a una remuneración mensual de <b>Bs. ${salario}</b>.</p> <br>
    </div>
    <p class='text-center'>Constancia que se expide a petición de la parte interesada en la ciudad de Caracas a los ${dia} días del mes de ${mes} de ${año}.</p><br><br>
    <p class='text-center'>Atentamente,</P><br><br>
    <p class='text-center'><b>MÓNICA GABRIELA UTRERA LUJAN</b></p>
    <p class='text-center'>Gerente General de Talento</p>
    <p class='text-center'>Designada mediante punto de cuenta nº 074 de fecha 20/09/2021</p><br><br><br>
    <p>YA.-</p><br>
    
    <p class='text-center'>Urb. Chacao, calle Pantin, Edificio HIDROVEN, C.A. Municipio Chacao, Parroquia Chacao, estado Miranda, Caracas - República Bolivariana de Venezuela</div>
    <br>
    <form id='pdf' action='../functions/generar_pdf.php' method='POST'>
        <input type='hidden' name='pdf_nombre' id='pdf_nombre' value='" .$nombre ."'>
        <input type='hidden' name='pdf_cedula' id='pdf_cedula' value='" .$cedula ."'>
        <input type='hidden' name='pdf_fecha' id='pdf_fecha' value='" .$fecha ."'>
        <input type='hidden' name='pdf_dpto' id='pdf_dpto' value='" .$dpto ."'>
        <input type='hidden' name='pdf_cargo' id='pdf_cargo' value='" .$cargo ."'>
        <input type='hidden' name='pdf_salario' id='pdf_salario' value='" .$salario ."'>
        <input type='hidden' name='pdf_dia' id='pdf_dia' value='" .$dia ."'>
        <input type='hidden' name='pdf_mes' id='pdf_mes' value='" .$mes ."'>
        <input type='hidden' name='pdf_año' id='pdf_año' value='" .$año ."'>

        <div class='d-flex justify-content-center'>
            <button id='imprimir' name='imprimir' type='submit' class='btn btn-primary my-3'>Imprimir</button>
        </div>
    </form>";
} else {
    // Se llegó mediante un método inusual
    header("location: index.php");
    exit();
}
?>