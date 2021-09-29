<?php
    session_start(); 

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $_SESSION['loggedin'] = false;
        header('Location: login.php');
    } else {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
    }
    
?>