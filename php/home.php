<!-- Revisar si la sesión inició -->
<?php
    session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Hidroven</title>
        
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>  
    <body>

        <div class="container d-flex justify-content-center">

            <!-- Mensaje de bienvenida -->
            <?php 
            
                // if (isset($_SESSION['clave'])) {
                //     echo 'Bienvenido, ' .$_SESSION['usuario'] .', su clave es: ' .$_SESSION['clave'];
                // } else {
                //     echo 'Bienvenido, ' .$_SESSION['usuario'];
                // }
                

                echo "Bienvenido " .(isset($_SESSION['clave']) ? $_SESSION['usuario'] .', su clave es: ' .$_SESSION['clave'] : $_SESSION['usuario']) .'.';
            ?>
            
        </div>
        
        <br />

        <!-- Logout dummy -->
        <div class="container d-flex justify-content-center">
            <form action="./auth.php" method="POST">
                <button type="submit" class="btn btn btn-primary m-2">Salir</button>
            </form>
        </div>

    </body>
</html>