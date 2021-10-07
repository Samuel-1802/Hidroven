<!-- Página de inicio de sesión -->

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Ingreso</title>
        <script src="../js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" type="image/png" href="../img/favicon.png"/>
    </head>

    <body>

        <?php
            include "../assets/header.php";
        ?>
        <div  class="container-fluid mx-auto" style="width: 80%;">
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
            
           
        </div>
        <?
            include "../assets/footer.php";
        ?>
    </body>
</html>