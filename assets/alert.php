<!-- Mensaje de alerta -->

<?php

    function alert_message($message, $type) {
        if ($type == 0) {
            ?>
            <!-- Mensaje verde -->
            
            <?php
        } else if ($type == 1) {?>
            <!-- Mensaje rojo -->
        
        <?php
        } else if ($type == 2) {?>
            <!-- Mensaje azul -->

        <?php
        } else {?>
            <!-- Mensaje amarillo -->

        <?php
        }

        unset($message);
        unset($type);
    }

?>