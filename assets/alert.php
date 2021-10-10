<!-- Mensaje de alerta -->

<?php

    if (isset($_SESSION['mensaje']) && isset($_SESSION['tipo_mensaje'])) {
        if ($_SESSION['tipo_mensaje'] == 0) {
            ?>
            <!-- Mensaje verde (success) -->
            <div class="alert alert-success" role="alert"><?php echo $_SESSION['mensaje']?></div>
            <?php
        } else if ($_SESSION['tipo_mensaje'] == 1) {?>
            <!-- Mensaje rojo (danger) -->
            <div class="alert alert-danger" role="alert"><?php echo "Error: " .$_SESSION['mensaje']?></div>
        <?php
        } else if ($_SESSION['tipo_mensaje'] == 2) {?>
            <!-- Mensaje amarillo (warning) -->
            <div class="alert alert-warning" role="alert"><?php echo $_SESSION['mensaje']?></div>
        <?php
        } else {?>
            <!-- Mensaje azul (info) -->
            <div class="alert alert-info" role="alert"><?php echo $_SESSION['mensaje']?></div>
        <?php
        }

        unset($_SESSION['mensaje']);
        unset($_SESSION['tipo_mensaje']);
    }

?>