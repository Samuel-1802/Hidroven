<?php
    $title = "Solicitudes";
    $JS = "solicitudes.js";
    include "../assets/header.php";
?>

<h3>Impuesto Sobre la Renta (ISLR)</h3>
<br>

<div class="col">
    <div class="row">
        Bienvenido al módulo de solicitud de ISLR.
    </div>

    <hr>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container d-flex justify-content-center" id="form-container">
                <form id="solicitud" action="#" method="POST">
                    <div class="form-group">
                        <label for="fiscal" class="my-2"><b>Año Fiscal</b></label>
                        <select class="form-select" id="fiscal" name="fiscal" ria-label="Default select example">
                            <option value="">Seleccione...</option>
                            <?php
                            // Crear función para obtener los años fiscales de db
                            ?>
                            <option value="2021">2021</option>
                        </select>
                    </div>
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
                <th>ISLR</th>
            </tr>
            <?php
            // Colocar función para mostrar los resultados de la búsqueda
            ?>
        </table>
    </div>
</div>

<?php
    include "../assets/footer.php";
?>