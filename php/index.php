<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header('Location: home.php');  
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Ingreso</title>
        
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body class="container-fluid">
        
        <h3 class="d-flex justify-content-center">Inicio de Sesión</h3>
        <br />
        
        <div class="container d-flex justify-content-center">

            <!-- Form para el login, dummy solo activa sesión sin revisar base de datos -->
            <form action="./auth.php" method="POST">
                <div class="form-group">
                    <label for="Username">Usuario</label>
                    <input type="text" class="form-control" id="Username" name="Username" aria-describedby="emailHelp" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                    <label for="Password">Clave</label>
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Clave">
                </div>
                <button type="submit" class="btn btn btn-primary m-2">Entrar</button>
            </form>
        </div>
        <br />
        
        <div class="container d-flex justify-content-center">
            <?php 
            
                if (isset($_SESSION['error'])) {
                    echo 'Error: ' .$_SESSION['error'];
                }

            ?>
        </div>

    </body>
</html>