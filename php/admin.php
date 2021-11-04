<?php
$title = "Administración - Recibos";
$JS = "audit.js";
include "../assets/header.php";
?>

<div class="row">
    <h3>Adiministración</h3>
    <br>
    <br>
    <hr>
</div>

<div class="row justify-content-center">
    <div class="col-md-6 justify-content-center">
        <div class="container">
        <h4>Año Fiscal: <?php

                        $result = ListAFiscal();
                        $fiscal = mysqli_fetch_assoc($result);
                        
                        echo $fiscal['a_fiscal'];

                        ?></h4>
        </div>
        <br>
        <div class="container justify-content-center">
            <h5>Añadir Año Fiscal</h5>
            <form action="../functions/nuevo_fiscal.php" method="POST">
                <div class="form-group">
                    <label for="n_fiscal" class="my-1">Nuevo Año Fiscal</label>
                    <input type="text" id="n_fiscal" name="n_fiscal" class="form-control" placeholder="Año Fiscal...">
                </div>
                <input type="submit" name="submit_fiscal" id="submit_fiscal" class="btn btn-primary text-center my-3" value="Confirmar">
            </form>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <h3>Cargar Documentos</h3>
    <br>
    <br>
    <br>
    <p>Seleccione la acción que desee realizar:</p>
</div>

<div class="row justify-content-around">
    <div class="col-md-6 justify-content-center">
        <div class="container">
            <a href="./admin_recibos.php" class="text-decoration-none">
                <div class="border rounded p-3 m-3 text-center"><b>Cargar Recibos de Pago</b></div>
            </a>
        </div>
    </div>
    <div class="col-md-6 justify-content-center">
        <div class="container">
            <a href="./admin_islr.php" class="text-decoration-none">
                <div class="border rounded p-3 m-3 text-center"><b>Cargar ISLR</b></div>
            </a>
        </div>
    </div>
</div>

<?php
include "../assets/footer.php";
?>