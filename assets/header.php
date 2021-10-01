<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        //Lasesión ya esta iniciada

    } else {
        //Nueva sesión

    }
?>