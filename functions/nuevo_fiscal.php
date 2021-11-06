<?php

if (isset($_POST['submit_fiscal'])){

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    $fiscal = $_POST['n_fiscal'];
    new_fiscal($fiscal);

} else {
    header('location: ../php/index.php');
}