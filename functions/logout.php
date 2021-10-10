<!-- Función logout -->

<?php

    session_start();

    $_SESSION = [];

    header('location: ../php/index.php');

?>