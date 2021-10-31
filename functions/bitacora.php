<?php

include("../functions/sql_queries.php");

if (isset($_SESSION['userid'])) {
    $usuario = $_SESSION['userid'];
} else {
    $usuario = NULL;
}
$ref = $_SERVER["REQUEST_URI"];
$paso = getenv("QUERY_STRING");

LogUserNavigation($usuario, $ref, $paso);
