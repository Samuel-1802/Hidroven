<?php

if (isset($_POST['submit_search'])) {

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    $fiscal = $_POST['fiscal'];
    $cedula = $_POST['cedula'];

    $result = fetch_islr($fiscal, $cedula);

    $table = "";

    while ($islr = $result->fetch_assoc()) {
        $table .= "<tr><td>".fetch_fiscal($islr['fiscal'])."</td><td>Ingreso: Bs. ". number_format($islr['ingreso'], 2, ",", ".") ."</td><td>Deducciones: Bs. ". number_format($islr['deduccion'], 2, ",", ".") ."</td></tr>";
    }

    echo $table;
    

} else {
    header("location: ../php/index.php");
}