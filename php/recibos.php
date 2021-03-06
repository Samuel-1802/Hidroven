<?php
$title = "Recibos";
$JS = "recibos.js";
include "../assets/header.php";
?>

<h3>Recibos de pago</h3>
<br>

<div class="col">
    <div class="row">
        Bienvenido al módulo de solicitud de recibos de pago.
    </div>

    <hr>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container d-flex justify-content-center" id="form-container">
                <form id="solicitud" action="../functions/buscar_recibos.php" method="POST">
                    <div class="form-group">
                        <label for="fiscal" class="my-2"><b>Año Fiscal</b></label>
                        <select class="form-select" id="fiscal" name="fiscal" ria-label="Default select example">
                            <option value="">Seleccione...</option>
                            <?php

                            $result = ListAllFiscal();

                            while ($año = $result->fetch_assoc()) {
                                echo '<option value = "' . $año['id'] . '">' . $año['a_fiscal'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" id="cedula" name="cedula" value="<?php echo $user['cedula'];?>">
                    <div>
                        <button id="submit_search" name="submit_search" type="submit" class="btn btn-primary my-3">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>

    <div class="row justify-content-center">
        <table class="table table-responsive">
            <tr>
                <th>Año fiscal</th>
                <th>Mes</th>
                <th colspan="4">Recibo</th>
            </tr>
            <tbody id="result"></tbody>
        </table>
    </div>
</div>

<?php
include "../assets/footer.php";
?>