<!-- Página de inicio de sesión -->

<?php
    $title = "Ingreso";
    include "../assets/header.php";
?>

            <h3 class="d-flex justify-content-center">BIENVENIDO A LA INTRANET C.A. HIDROVEN</h3>
            <br />
            <h3 class="d-flex justify-content-center">INICIO DE SESIÓN</h3>
            <br />

            <div class="container d-flex justify-content-center">
                <?php 
                
                    if (isset($_SESSION['error'])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                        <?php
                        echo "Error: " .$_SESSION['error'];
                        unset($_SESSION['error']);?>
                    </div>
                    <?php
                    }
                ?> 
            </div>
            
            <div class="container d-flex justify-content-center p-3">

                <!-- Form para el login, dummy solo activa sesión sin revisar base de datos -->
                <form action="./auth.php" method="POST">
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