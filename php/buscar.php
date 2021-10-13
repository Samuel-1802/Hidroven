<?php
$title = "Buscar Usuarios";
include "../assets/header.php";
?>

<h3>Buscar y modificar usuarios</h3>

<div class="container d-flex justify-content-center">
    <?php

    include_once "../assets/alert.php";

    ?>
</div>

<div class="container d-flex justify-content-center">
    <form action="../functions/buscar.php" method="POST">
        <div class="row">
            <div class="form-group col container">
                <input type="text" class="form-control mb-2 mr-sm-2" id="ci" name="ci" placeholder="Cédula" step=1 required>
            </div>
            <div class="col container">
                <button type="submit" class="btn btn btn-primary mb-2">Buscar</button>
            </div>
        </div>
    </form>
</div>

<br>

<div class="container d-flex justify-content-center">
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