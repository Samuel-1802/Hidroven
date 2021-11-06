<?php
$title = "Administración - ISLR";
$JS = "admin_islr.js";
include "../assets/header.php";
?>

<div class="row">
    <h3>Cargar ISLR</h3>
    <br>
    <br>
    <hr>
</div>

<div class="row" id="result"></div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form id="form_islr" action="../functions/subir_islr.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <?php
                $result = ListUsers();
                ?>
                <select name="usuario" id="usuario" class="form-select">
                    <option value="">Usuario</option>
                    <?php
                    while ($users = $result->fetch_assoc()) {
                        echo '<option value = "' . $users['cedula'] . '">' . $users['p_apellido'] . ' ' . $users['p_nombre'] . ', ' . $users['cedula'] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <div class="form-group">
                    <label for="ingreso">Ingreso</label>
                    <input name="ingreso" id="ingreso" class="form-control" type="number" step="0.01" default="0" placeholder="0.00">
                </div>
                <br>
                <div class="form-group">
                    <label for="deduc">Deducciones</label>
                    <input name="deduc" id="deduc" class="form-control" type="number" step="0.01" default="0" placeholder="0.00">
                </div>
                <div>
                    <button id="submit_islr" name="submit_islr" type="submit" class="btn btn btn-primary my-3">Cargar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include "../assets/footer.php";
?>