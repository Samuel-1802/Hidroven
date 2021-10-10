<!-- Header -->

<?php
    session_start();

    if (isset($_SESSION['userid']) && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
        include_once "../functions/sql_queries.php";
        $user = fetch_user($conn, $_SESSION['userid']);
    }

?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" type="image/png" href="../img/favicon.png"/>
    </head>

    <body>

            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light d-flex flex-column">
                <div class="container-fluid">
                    <img class="img-fluid float-left" src="../img/minaguas.png" style="background: transparent;" width="30%">
                    <img class="img-fluid float-right" src="../img/200rif.png" style="background: transparent;" width="15%">
                </div>
                <div class="container-fluid justify-content-between">
                    <a class="navbar-brand" href="./index.php"><img src="../img/hidroven.png" class="img-fluid" style="background: transparent;"></a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="nav">
                        
                        <ul class="nav navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./la_empresa.php">La Empresa</a>
                            </li>
                            <?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./perfil.php">Perfíl</a>
                            </li>
                            <?php
                                }
                            ?>
                            <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $user['admin'] == 1){
                            ?>
                            <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
                            <?php
                            }
                            ?>
                            <li class="nav-item "><a href="
                            <?php echo ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ? "../functions/logout.php" : "./login.php");?>" class="nav-link">
                            <?php echo ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ? "Salir" : "Ingresar");?></a></li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
        <br>

        
        <div class="container-fluid mx-auto " style="width: 80%">