<?php
$title = "Restaurar Base de Datos";
$JS = "restore.js";
include "../assets/header.php";
?>

<h3>Restaurar Base de Datos</h3>

<div class="row">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <form action="restoreExecute.php?action=restore" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="archivo">Archivo SQL</label>
                    <input type="file" name="archivo" type="archivo" accept=".sql" class="form-control my-1" />
                    <input type="submit" name="submit_restore" id="submit_restore" class="btn btn-primary my-3" value="Restaurar" />
                </div>
                <input type="hidden" name="h_action" id="h_action" value="upload" />
            </form>
        </div>
    </div>
</div>


<?php
include "../assets/footer.php";
?>