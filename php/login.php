<!-- Página de inicio de sesión -->

<?php
// Redireccionar a la p'agina de inicio si la sesión está activa
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: index.php');
}

$title = "Ingreso";
$JS = "login.js";
include "../assets/header.php";
?>

<div>

    <h3 class="d-flex justify-content-center">BIENVENIDO A LA INTRANET C.A. HIDROVEN</h3>
    <br>
    <h3 class="d-flex justify-content-center">INICIO DE SESIÓN</h3>
    <br>

</div>

<div class="container d-flex justify-content-center" id="result"></div>

<div class="container d-flex justify-content-center p-3">

    <form action="../functions/auth.php" id="login" method="POST">
        <div class="form-group">
            <label for="Username">Usuario</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese su nombre de usuario">
                <input type="text" class="form-control" id="Username" name="Username" aria-describedby="emailHelp" placeholder="Nombre de usuario">
            </span>
        </div>
        <br>
        <div class="form-group">
            <label for="Password">Contraseña</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese su contraseña">
                <input type="password" class="form-control" id="Password" name="Password" placeholder="Contraseña" title="Ingrese su contraseña">
            </span>
        </div>
        <br>
        <button id="submit_login" name="submit_login" type="submit" class="btn btn btn-primary">Entrar</button>
        <!-- <a href="./recuperar.php">Olvidé mi contraseña</a> -->
    </form>
</div>

<br>

<?php
include "../assets/footer.php";
?>