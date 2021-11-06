<?php
$title = "Administración - Recibos";
$JS = "admin_recibo.js";
include "../assets/header.php";
?>

<div class="row">
    <h3>Cargar Recibos de Pago</h3>
    <br>
    <br>
    <hr>
</div>

<div class="row" id="result"></div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form id="form_recibo" action="../functions/subir_recibo.php" method="POST">
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
                    <label for="sso">Seguro Social Obligatorio</label>
                    <input name="sso" id="sso" class="form-control" type="number" step="0.01" default="0" placeholder="0.00">
                </div>
                <br>
                <div class="form-group">
                    <label for="lrpe">Paro Forzoso</label>
                    <input name="lrpe" id="lrpe" class="form-control" type="number" step="0.01" default="0" placeholder="0.00">
                </div>
                <br>
                <div class="form-group">
                    <label for="faov">Fondo de Ahorro Obligatorio para la Vivienda</label>
                    <input name="faov" id="faov" class="form-control" type="number" step="0.01" default="0" placeholder="0.00">
                </div>
                <input type="hidden" id="mes" value="<?php $mes= strftime("%m"); echo $mes ;?>">
                <div>
                    <button id="submit_recibo" name="submit_recibo" type="submit" class="btn btn btn-primary my-3">Cargar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include "../assets/footer.php";
?>