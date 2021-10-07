<!-- Perfil de usuarios -->

<?php
    session_start();
    include_once './connection.php';
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

        <div class="container-fluid" style="width: 80%">

            <h3>Perfil de usuario</h3>

            <table class="table">
                
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $_SESSION['nombre'] .' ' .$_SESSION['apellido']; ?></td>
                </tr>
                <tr>
                    <th>Cedula</th>
                    <td><?php echo $_SESSION['cedula']; ?></td>
                </tr>
                <tr>
                    <th>Nacionalidad</th>
                    <td><?php echo $_SESSION['nacionalidad']; ?></td>
                </tr>
                <tr>
                    <th>Nombre de usuario</th>
                    <td><?php echo $_SESSION['userid']; ?></td>
                </tr>
                
            </table>

            <form action="./editar.php" method="POST">
                <button type="submit" class="btn btn btn-primary mb-2">Editar</button>
            </form>

        </div>
        
        <?
            include "../assets/footer.php";
        ?>

    </body>
</html>