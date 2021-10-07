<!-- <div>
    <div class="container d-flex justify-content-between">
        <img src="../img/gob.png" height="65" width="325" class="img-fluid" />
        <img src="../img/200-rif.png" height="65" width="155" class="img-fluid" />
    </div>

    <div class="<?php 
    // echo "container " .(isset($_SESSION['loggedin']) ? "d-flex justify-content-between" : "d-flex justify-content-center"); 
    ?>">
        <img src="../img/logo.png" class="img-fluid" />
        
    <?php
        // echo ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ? "Bienvenido(a) " .$_SESSION['usuario'] : "");
    ?>
    </div>
    <br />
</div> -->

<!-- ====== Tutorial Nav ====== -->
<div>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light d-flex flex-column">
        <div class="container-fluid">
            <img class="img-fluid float-left" src="../img/minaguas.png" style="background: transparent;" width="30%">
            <img class="img-fluid float-right" src="../img/200-rif.png" style="background: transparent;" width="15%">
        </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php"><img src="../img/hidroven.png" class="img-fluid" style="background: transparent;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <a class="nav-link" aria-current="page" href="./perfil.php">Perfil</a>
                    </li>
                    <?php
                        }
                    ?>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['isAdmin'] == 1){
                    ?>
                    <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
                    <?php
                    }
                    ?>
                    <li class="nav-item"><a href="
                    <?php echo ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ? "./auth.php" : "./login.php");?>" class="nav-link">
                    <?php echo ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ? "Salir" : "Ingresar");?></a></li>
                </ul>
                
            </div>
        </div>
    </nav>
</div>
<br>