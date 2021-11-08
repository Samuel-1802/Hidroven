<?php

if (isset($_POST['submit_search'])) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    $fiscal = $_POST['fiscal'];
    $cedula = $_POST['cedula'];

    $result = fetch_recibos($fiscal, $cedula);

    $table = "";

    while ($recibos = $result->fetch_assoc()) {
        $table .= "<tr><td>".fetch_fiscal($recibos['fiscal'])."</td><td>".ucwords(fetch_mes($recibos['mes']))."</td><td>Ingreso: Bs. ". number_format($recibos['ingreso'], 2, ",", ".") ."</td><td>SSO: Bs. ". number_format($recibos['sso'], 2, ",", ".") ."</td><td>LRPE: Bs. ".number_format($recibos['lrpe'], 2, ",", ".")."</td><td>FAOV: Bs. ".number_format($recibos['faov'], 2, ",", ".")."</td></tr>";
    }

    echo $table;
    

} else {
    header("location: ../php/index.php");
}