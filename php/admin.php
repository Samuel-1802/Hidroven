<!-- Página de Administración -->

<?php
$title = "Administración";
include "../assets/header.php";
?>

<h3>Agregar usuarios</h3>
<br>

<form action="./nuevo_usuario.php" method="POST">
    <div class="form-group">
        <label for="n_cedula">Cédula</label>
        <input type="text" class="form-control" id="n_cedula" name="n_cedula" placeholder="Cédula" step="1" required>
    </div>
    <br>
    <div class="form-group">
        <label for="n_nombre">Nombre</label>
        <input type="text" class="form-control" id="n_nombre" name="n_nombre" placeholder="Nombre" required>
    </div>
    <br>
    <div class="form-group">
        <label for="n_apellido">Apellido</label>
        <input type="text" class="form-control" id="n_apellido" name="n_apellido" placeholder="Apellido" required>
    </div>
    <br>
    <label for="n_nacionalidad">Nacionalidad</label>
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="n_nacionalidad" id="venezolano" value="Venezolano">
        <label class="form-check-label" for="venezolano">
            Venezolano
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="n_nacionalidad" id="extranjero" value="Extranjero">
        <label class="form-check-label" for="exranjero">
            Extranjero
        </label>
    </div>
    <br>
    <br>
    <div class="form-group">
        <label for="n_userid">Nombre de Usuario</label>
        <input type="text" class="form-control" id="n_userid" name="n_userid" placeholder="Nombre de usuario" required>
    </div>
    <br>
    <div class="form-group">
        <label for="n_clave">Clave</label>
        <input type="password" class="form-control" id="n_clave" name="n_clave" placeholder="Clave" required>
    </div>
    <br>
    <label for="n_admin">Tipo de Usuario</label>
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="n_admin" id="admin" value="1">
        <label class="form-check-label" for="admin">
            Administrador
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="n_admin" id="no admin" value="0">
        <label class="form-check-label" for="no admin">
            No Administrador
        </label>
    </div>
    <br>
    <br>
    <button type="submit" class="btn btn btn-primary">Agregar</button>
    <!-- <a href="./recuperar.php">Olvidé mi contraseña</a> -->
</form>

<div class="container d-flex justify-content-center">
    <?php

    if (isset($_SESSION['confirm'])) {
        echo $_SESSION['confirm'];
        unset($_SESSION['confirm']);
    }
    ?>

</div>

<br>
<br>
<h3>Buscar y modificar usuarios</h3>
<br>

<form action="./search.php" class="form-inline" method="POST">
    <div class="form-group">
        <input type="text" class="form-control mb-2 mr-sm-2" id="ci" name="ci" placeholder="Cédula" step=1 required>
    </div>
    <button type="submit" class="btn btn btn-primary mb-2">Buscar</button>
</form>

<br>
<div class="container d-flex justify-content-center">
    <?php

    if (isset($_SESSION['search_confirm'])) {
    ?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['search_confirm'];
            unset($_SESSION['search_confirm']); ?>
        </div>
    <?php
    }
    ?>
</div>

<div class="container d-flex justify-content-center">
    <?php

    if (isset($_SESSION['d_confirm'])) {
    ?>
        <div class="alert alert-success" role="alert">
            <?php
            echo $_SESSION['d_confirm'];
            unset($_SESSION['d_confirm']); ?>
        </div>
    <?php
    }
    ?>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Cédula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Usuario</th>
            <th scope="col">Estado</th>
            <th scope="col" colspan="2">Acción</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if (isset($_SESSION['search'])) {
            if ($_SESSION['search']) {

        ?>
                <tr>
                    <th scope="row"><?php echo $_SESSION['s_cedula']; ?></th>
                    <td><?php echo $_SESSION['s_nombre']; ?></td>
                    <td><?php echo $_SESSION['s_apellido']; ?></td>
                    <td><?php echo $_SESSION['s_userid']; ?></td>
                    <td><?php echo $_SESSION['s_estado'] == 1 ? "Activo" : "Inactivo"; ?></td>
                    <td><a href="./edit_usuario.php">Editar</a></td>
                    <td><a href="./toggle_usuario.php"><?php echo $_SESSION['s_estado'] == 1 ? "Desactivar" : "Activar"; ?></a></td>
                </tr>

        <?php

                $_SESSION['search'] = false;
            }
        }
        ?>
    </tbody>
</table>
<br>

<?php
include "../assets/footer.php";
?>