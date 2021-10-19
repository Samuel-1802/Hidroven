<?php
$title = "Solicitudes";
$JS = "constancias.js";
include "../assets/header.php";
?>

<h3>Solicitud de constancia de trabajo</h3>

<br>
<p>Bienvenido al módulo de solicitud de constancias de trabajo. A continuación encontrará la información que se imprimirá en la constancia que solocita. Verifique que los datos estén correctos antes de solicitar su documento.</p>
<br>

<div class="container d-flex justify-content-center">

    <form id="constancia" action="../functions/generar_constancia.php" method="POST" style="width: 30%;">
        <div class="form-group">
            <label for="nombre"><b>Nombre</b></label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese su nombre completo">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" value="<?php echo $user['p_nombre'] . " " . $user['s_nombre'] . " " . $user['p_apellido'] . " " . $user['s_apellido']; ?>" required>
            </span>
        </div>
        <br>
        <div class="form-group">
            <label for="cedula"><b>Cédula</b></label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Su número de cédula">
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" value="<?php echo $user['cedula']; ?>" required disabled>
            </span>
        </div>
        <br>
        <div class="form-group">
            <label for="fechaing"><b>Fecha de ingreso</b></label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Fecha en la que ingresó a al institución">
                <input type="date" class="form-control" id="fechaing" name="fechaing" placeholder="dd/mm/aaaa" value="<?php echo $user['fecha_ing']; ?>" required disabled>
            </span>
        </div>
        <br>
        <div class="form-group">
            <label for="dpto"><b>Departamento</b></label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Departamento al que está adscrito">
                <input type="text" class="form-control" id="dpto" name="dpto" placeholder="Departamento" value="<?php echo $dpto['dpto']; ?>" required disabled>
            </span>
        </div>
        <br>
        <div class="form-group">
            <label for="cargo"><b>Cargo</b></label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Cargo que desempeña">
                <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" value="<?php echo $user['cargo']; ?>" required disabled>
            </span>
        </div>
        <br>
        <div class="form-group">
            <label for="salario"><b>Salario</b></label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Su salario actual">
                <input type="number" step="any" class="form-control" id="salario" name="salario" placeholder="0.00" value="<?php echo $user['salario']; ?>" required disabled>
            </span>
        </div>

        <div>
            <button id="submit_const" name="submit_const" type="submit" class="btn btn btn-primary my-3">Generar</button>
        </div>
    </form>

</div>

<div id="result" class="container row d-flex justify-content-center"></div>

<?php
include "../assets/footer.php";
?>