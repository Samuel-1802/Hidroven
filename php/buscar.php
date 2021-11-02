<?php
$title = "Buscar Usuarios";
$JS = "buscar.js";
include "../assets/header.php";
?>

<h3>Buscar y modificar usuarios</h3>
<br>

<div class="container d-flex justify-content-center" id="result"></div>

<div class="container d-flex justify-content-center">
    <form id="buscar" action="../functions/buscar.php" method="POST">
        <div class="row">
            <div class="form-group col container">
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese la cédula del usuario<br>• Debe contener solo dígitos, sin puntos<br>• Debe tener una longitud máxima de 8 caracteres">
                    <input type="text" class="form-control mb-2 mr-sm-2" id="ci" name="ci" placeholder="Cédula" step=1>
                </span>
            </div>
            <div class="col container">
                <button id="submit_buscar" name="submit_buscar" type="submit" class="btn btn btn-primary mb-2" disabled>Buscar</button>
            </div>
        </div>
    </form>
</div>

<br>

<div id="user_result" class="container d-flex justify-content-center">
    <table class="table" style="width: 70%">
        <thead>
            <tr>
                <th scope="col">Cédula</th>
                <th scope="col" colspan="2">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">Estado</th>
                <th scope="col" colspan="2">Acción</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (isset($_SESSION['search_userid'])) {

                $userdata = fetch_user($conn, $_SESSION['search_userid']);

                if (!empty($userdata)) {

            ?>
                    <tr>
                        <th scope="row"><?php echo $userdata['cedula']; ?></th>
                        <td colspan="2"><?php echo $userdata['p_nombre'] . " " . $userdata['s_nombre'] . " " . $userdata['p_apellido'] . " " . $userdata['s_apellido']; ?></td>
                        <td><?php echo $userdata['userid']; ?></td>
                        <td><?php echo $userdata['estado'] == 1 ? "Activo" : "Inactivo"; ?></td>
                        <td><a href="./admin_editar.php" class="text-decoration-none">Editar</a></td>
                        <td><a href="../functions/toggle_usuario.php" class="text-decoration-none"><?php echo $userdata['estado'] == 1 ? "Desactivar" : "Activar"; ?></a></td>
                    </tr>

            <?php

                    unset($userdata);
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include "../assets/footer.php";
?>