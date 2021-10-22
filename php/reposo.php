<?php
$title = "Solicitudes";
$JS = "solicitudes.js";
include "../assets/header.php";
?>

<h3>Reposo médico</h3>

<p></p>

<div class="container d-flex justify-content-center">
    <form action="../functions/subir_reposo.php" method="POST">
        <div class="form-group container">
            <label for="cedula">Cédula</label>
            <input class="form-control" type='file' id="cedula" name="cedula">
        </div>
        <br>
        <div class="form-group container">
            <label for="informe">Informe médico</label>
            <input class="form-control" type='file' id="informe" name="informe">
        </div>
        <br>
        <div class="form-group container">
            <label for="prescripcion">Prescripción</label>
            <input class="form-control" type='file' id="prescripcion" name="prescripcion">
        </div>
        <div class="container">
            <button id="submit_reposo" name="submit_reposo" type="submit" class="btn btn btn-primary my-3">Enviar</button>
        </div>
    </form>
</div>

<div class="container row d-flex justify-content-center">
    <div id="result" class="container" style="width: 60%"></div>
</div>

<?php
include "../assets/footer.php";
?>