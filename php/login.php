<!-- Página de inicio de sesión -->

<?php
// Redireccionar a la p'agina de inicio si la sesión está activa
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: index.php');
}

$title = "Ingreso";
include "../assets/header.php";
?>

<h3 class="d-flex justify-content-center">BIENVENIDO A LA INTRANET C.A. HIDROVEN</h3>
<br />
<h3 class="d-flex justify-content-center">INICIO DE SESIÓN</h3>
<br />

<div class="container d-flex justify-content-center">
    <?php

    include_once '../assets/alert.php';

    ?>
</div>

<div class="container d-flex justify-content-center p-3">

    <!-- Form para el login, dummy solo activa sesión sin revisar base de datos -->
    <form action="../functions/auth.php" method="POST">
        <div class="form-group">
            <label for="Username">Usuario</label>
            <input type="text" class="form-control" id="Username" name="Username" aria-describedby="emailHelp" placeholder="Nombre de usuario">
        </div>
        <br>
        <div class="form-group">
            <label for="Password">Contraseña</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Contraseña">
        </div>
        <br>
        <button type="submit" class="btn btn btn-primary">Entrar</button>
        <!-- <a href="./recuperar.php">Olvidé mi contraseña</a> -->
    </form>
</div>
<br />

<?php
include "../assets/footer.php";
?>