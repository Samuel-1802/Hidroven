<?php

if (isset($_POST['submit_fiscal'])){

    session_start();
    include_once "./functions.php";
    include_once "./sql_queries.php";

    $fiscal = $_POST['n_fiscal'];
    new_fiscal($fiscal);

    header('location: ../php/admin.php');

} else {
    header('location: ../php/index.php');
}