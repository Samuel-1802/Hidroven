<!-- Header -->

<?php
session_start();

if (isset($_SESSION['userid']) && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    include_once "../functions/sql_queries.php";
    $user = fetch_user($conn, $_SESSION['userid']);
    $dpto = fetch_dpto($conn, $user['dpto']);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js" async></script>
    <script type="text/javascript" src="../js/<?php echo $JS; ?>" async></script>
    
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light d-flex flex-column" style="background: rgba(66, 135, 245,0.10)">
        <div class="container-fluid">
            <img class="img-fluid float-left" src="../img/minaguas.png" style="background: transparent;">
            <img class="img-fluid float-right" src="../img/200rif.png" style="background: transparent;">
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
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="solicitudes" role="button" data-bs-toggle="dropdown" aria-expanded="false">Solicitudes</a>

                            <ul class="dropdown-menu" aria-labelledby="solicitudes">
                                <li><a class="dropdown-item" href="./solicitudes.php">Constancia de trabajo</a></li>
                                <li><a class="dropdown-item" href="./solicitudes.php">Solicitud de vacaciones</a></li>
                                <li><a class="dropdown-item" href="./solicitudes.php">Reposo médico</a></li>
                                <li><a class="dropdown-item" href="./solicitudes.php">Recibos de pago</a></li>
                                <li><a class="dropdown-item" href="./solicitudes.php">ISLR</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $user['admin'] == 1) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="usuarios" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</a>
                            <ul class="dropdown-menu" aria-labelledby="usuarios">
                                <li><a class="dropdown-item" href="./registrar.php">Registrar usuarios</a></li>
                                <li><a class="dropdown-item" href="./buscar.php">Editar usuarios</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $user['admin'] == 1) {
                    ?>
                        <li class="nav-item"><a class="nav-link" href="./audit.php">Auditoría</a></li>
                    <?php
                    }
                    ?>
                    <li class="nav-item "><a href="
                            <?php echo ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ? "../functions/logout.php" : "./login.php"); ?>" class="nav-link">
                            <?php echo ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ? "Salir" : "Ingresar"); ?></a></li>
                </ul>

            </div>
        </div>
    </nav>
    <br>

    <div class="container-fluid mx-auto " style="width: 80%">