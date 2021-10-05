<!-- Página home -->

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
    </head>

    <body class="container-fluid mx-auto" style="width: 70%;">

        <?php
            include "../assets/header.php";
        ?>

        <h3>Home</h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <br>

        <?php
            
            // $sql = "SELECT * FROM usuarios;";
            // $result = mysqli_query($conn, $sql);
            // $resultCheck = mysqli_num_rows($result);

            // if ($resultCheck > 0){
            //     while ($row = mysqli_fetch_assoc($result)) {
            //         print_r($row);
            //     }
            // } else {
            //     echo "No hay resultados";
            // }

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "Bienvenido(a) " .$_SESSION['nombre'] ." " .$_SESSION['apellido'];
            }
        ?>

    </body>
</html>