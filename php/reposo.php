<?php
$title = "Solicitudes";
$JS = "reposo.js";
include "../assets/header.php";
?>

<h3>Reposo médico</h3>
<br>

<div class="row container" name="text" id="text">
    Bienvenido al módulo de reporte de reposos médicos. Aquí podrá subir los documentos necesarios, tome en cuenta que sólo pueden ser en formato JPG, JPEG, PNG o PDF y un tamaño máximo de 5MB.
</div>
<hr>
<br>

<div class="container row d-flex justify-content-center">
    <div id="result" class="container d-flex justify-content-center" style="width: 60%"></div>
</div>

<div class="container d-flex justify-content-center">
    <form id="reposo" action="../functions/subir_reposo.php" method="POST" enctype="multipart/form-data">
        <div class="form-group container">
            <label for="cedula">Cédula</label>
            <input class="form-control" type='file' id="cedula" name="cedula" required>
        </div>
        <br>
        <div class="form-group container">
            <label for="informe">Informe médico</label>
            <input class="form-control" type='file' id="informe" name="informe" required>
        </div>
        <br>
        <div class="form-group container">
            <label for="prescripcion">Prescripción</label>
            <input class="form-control" type='file' id="prescripcion" name="prescripcion" required>
        </div>
        <input type='hidden' name='id' id="id" value="<?php echo $user['cedula']; ?>">
        <div class="container">
            <button id="submit_reposo" name="submit_reposo" type="submit" class="btn btn btn-primary my-3">Enviar</button>
        </div>
    </form>
</div>

<?php
include "../assets/footer.php";
?>