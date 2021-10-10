<!-- Perfil de usuarios -->

<?php
$title = "Perfil";
include "../assets/header.php";
?>
<div class="container row d-flex justify-content-center">

    <div class="container d-flex justify-content-center">
        <h3>Perfíl de usuario</h3>
    </div>

    <br>
    <br>

    <table class="table" style="width: 50%">

        <tr>
            <th>Nombre</th>
            <td><?php echo $user['p_nombre'] . " " . $user['s_nombre'] . " " . $user['p_apellido'] . " " . $user['s_apellido']; ?></td>
        </tr>
        <tr>
            <th>Cédula</th>
            <td><?php echo $user['cedula']; ?></td>
        </tr>
        <tr>
            <th>Nacionalidad</th>
            <td><?php echo ($user['nacionalidad'] == 1 ? "Venezolano" : "Extranjero"); ?></td>
        </tr>
        <tr>
            <th>Nombre de usuario</th>
            <td><?php echo $user['userid']; ?></td>
        </tr>
        <tr>
            <th>Fecha de nacimiento</th>
            <td><?php
                $fechanac = date_create($user['fecha_nac']);
                echo date_format($fechanac, "d/m/Y"); ?></td>
        </tr>
        <tr>
            <th>Fecha de ingreso</th>
            <td><?php
                $fechaing = date_create($user['fecha_ing']);
                echo date_format($fechaing, "d/m/Y"); ?></td>
        </tr>
        <tr>
            <th>Cargo</th>
            <td><?php echo $user['cargo']; ?></td>
        </tr>
        <tr>
            <th>Departamento</th>
            <td><?php echo $user['dpto']; ?></td>
        </tr>

    </table>

    <br>
    <br>

    <div class="container d-flex justify-content-center">
        <form action="./editar.php" method="POST">
            <button type="submit" class="btn btn btn-primary">Editar</button>
        </form>

        <form action="./cambio_clave.php" method="POST">
            <button type="submit" class="btn btn btn-primary mx-3">Cambiar Clave</button>
        </form>
    </div>

</div>

<?php
include "../assets/footer.php";
?>