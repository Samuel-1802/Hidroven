<?php
$title = "Restaurar Base de Datos";
$JS = "restore.js";
include "../assets/header.php";
?>

<div class="row">
    <div class="row text-center">
        <h3>Restaurar Base de Datos</h3>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="alert alert-info text-center">
                <?php
                if (isset($_GET['action'])) {
                    $accion = $_GET['action'];
                } else {
                    $accion = 'default';
                }

                switch ($accion) {
                    case 'restore':
                        $usuario = 'root';
                        $clave = '';
                        $server = 'localhost';
                        $db = 'hidroven';

                        if (isset($_POST['archivo'])) {
                            $archivo = $_POST['archivo'];
                        } else {
                            $archivo = "Null";
                        }

                        $status = "<h5>Estado de restauración:</h5>";

                        if ($_POST['h_action'] == 'upload') {
                            $size = $_FILES['archivo']['size'];
                            $type = $_FILES['archivo']['type'];
                            $archivo = $_FILES['archivo']['name'];
                            $prefix = substr(md5(uniqid(rand())), 0, 6);
                            $ext = substr($archivo, -3, 3);

                            if ($archivo != "") {
                                $destino = "respaldo" . $prefix . "_" . $archivo;

                                if (copy($_FILES['archivo']['tmp_name'], $destino)) {
                                    $status = $status . "<p>Archivo subido: " . $archivo . "</p>";
                                } else {
                                    $status = $status . "<p>Error al subir el archivo</p><a href='restore.php' class='btn btn-primary text-center'>Regresar</a>";
                                }

                                if (!($link = mysqli_connect($server, $usuario, $clave))) {
                                    $status = $status . "<p>Error seleccionando la base de datos</p><a href='restore.php' class='btn btn-primary text-center'>Regresar</a>";
                                    unlink($destino);
                                }

                                $i = 0;
                                $j = 0;

                                if (!mysqli_select_db($link, $db)) {
                                    $status = $status . "<p>Error seleccionando la base de datos</p><a href='restore.php' class='btn btn-primary text-center'>Regresar</a>";
                                    unlink($destino);
                                } else {
                                    $openfile = fopen($destino, 'r');
                                    $sql = explode(",", file_get_contents($destino));

                                    foreach ($sql as $query) {
                                        if (!mysqli_query($link, $query)) {
                                            $i++;
                                        }
                                        $j++;
                                    }

                                    fclose($openfile);
                                    unlink($destino);

                                    if ($i = $j) {
                                        $status = $status . "<p>Información restaurada con éxito</p>";
                                    } else {
                                        $status = $status . "<p>Error restaurando "($j - $i) . " regsistros</p><a href='restore.php' class='btn btn-primary text-center'>Regresar</a>";
                                    }

                                    echo $status;
                                }
                            } else {
                                $status = $status . "<p>Error al subir el archivo</p> <a href='restore.php' class='btn btn-primary text-center'>Regresar</a>";
                                echo $status;
                            }
                        }

                        break;

                    default:
                        echo "
                        <h4>Error</h4>
                        <p>Acción no especificada, por favor, regrese al menú anterior e intente nuevamente</p>
                        <a href='restore.php' class='btn btn-primary text-center'>Regresar</a>
                        ";
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include "../assets/footer.php";
?>