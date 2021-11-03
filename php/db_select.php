<?php
$title = "Base de Datos";
$JS = "bd.js";
include "../assets/header.php";
?>

<div class="row">
    <h3>Adiministración de Base de Datos</h3>
    <br>
    <br>
    <br>
    <p>Seleccione la acción que desee realizar:</p>
</div>

<div class="row justify-content-around">
    <div class="col-md-6 justify-content-center">
        <div class="container">
            <a href="./backup.php" class="text-decoration-none"><div class="border rounded p-3 m-3 text-center"><b>Respaldar Base de Datos</b></div></a>
        </div>
    </div>
    <div class="col-md-6 justify-content-center">
        <div class="container">
            <a href="./restore.php" class="text-decoration-none"><div class="border rounded p-3 m-3 text-center"><b>Restaurar Base de Datos</b></div></a>
        </div>
    </div>
</div>


<?php
include "../assets/footer.php";
?>