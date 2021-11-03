<?php
    $title = "Respaldo de Base de Datos";
    $JS = "backup.js";
    include "../assets/header.php";

    session_name();
    ob_start();
    session_start();
    date_default_timezone_set("America/Caracas");
?>

<h3>Respaldar Base de Datos</h3>
<br>

<div class="row">

</div>

<div class="row justify-content-center">

</div>

<?php
    include "../assets/footer.php";
?>