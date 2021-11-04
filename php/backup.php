<?php
$title = "Respaldo de Base de Datos";
$JS = "backup.js";
include "../assets/header.php";

session_name();
ob_start();
date_default_timezone_set("America/Caracas");
?>

<h3>Respaldar Base de Datos</h3>
<br>

<div class="row">

</div>

<div class="row">
    <div class="col-md-12 justify-content-center">
        <div class="container text-center justify-content-center">
            <?php

            /**
             * @version 1.0
             */

            // Reporte de errores
            error_reporting(E_ALL);

            /*
Definición de parámetros de conexión a base datos
Ruta de almacenamiento del respaldo  y cantidad de
tablas a respaldar
*/

            define("USUARIO", "root");
            define("ACCESO", "");
            define("DB", "hidroven");
            define("SERVIDOR", "localhost");
            define("DIRECTORIO", 'C:\xampp\htdocs\hidroven\respaldos\\');
            define("TABLES", "*");

            class Database_Backup
            {

                var $host = "";
                var $username = "";
                var $password = "";
                var $db = "";
                var $charset = "";

                function Database_Backup($host, $username, $password, $db, $charset = "utf8")
                {
                    $this->host = $host;
                    $this->username = $username;
                    $this->password = $password;
                    $this->db = $db;
                    $this->charset = $charset;
                }

                /**
                 * [backupTables]
                 * Copia de seguridad de toda la base de datos o una parte de la misma.
                 * Para respaldar toda la base de datos, utilizar "*"
                 * Para respaldar solo ciertas tablas, utilizar "tabla1, tabla2, tabla3..."
                 * @param string $tables [description]
                 **/

                public function backupTables($tables, $outputDir)
                {
                    $conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);

                    try {
                        if ($tables = "*") {
                            $tables = array();
                            $result = mysqli_query($conn, "SHOW TABLES FROM " . $this->db . ";");

                            while ($row = mysqli_fetch_row($result)) {
                                $tables[] = $row[0];
                            }
                        } else {
                            $tables = is_array($tables) ? $tables : explode(",", $tables);
                        }

                        $sql = "-- C. A. HIDROVEN \r\n --Version 1.0 \r\n -- Creado por: \r\n -- Ing. Samuel Velasquez\r\n -- Fecha: 16 de noviembre de 2021\r\n";

                        $sql .= "CREATE DATABASE IF NOT EXISTS " . $this->db . ";\r\n";
                        $sql .= "USE " . $this->db . ";\r\n";

                        foreach ($tables as $table) {
                            echo "Respaldando tabla \"" . $table . "\"...";

                            $tabla = mysqli_query($conn, "SELECT *  FROM " . $table . ";");
                            $fields = mysqli_num_fields($tabla);

                            $sql .= "DROP TABLE IF EXISTS " . $table . ";\r\n";
                            $row2 = mysqli_fetch_row(mysqli_query($conn, "SHOW CREATE TABLE " . $table . ";"));

                            $sql .= $row2[1] . ";\r\n";

                            for ($i = 0; $i < $fields; $i++) {
                                while ($row = mysqli_fetch_row($tabla)) {
                                    $sql .= "INSERT INTO " . $table . " VALUES(";

                                    for ($j = 0; $j < $fields; $j++) {
                                        $row[$j] = addslashes($row[$j]);
                                        $row[$j] = preg_replace("~\n~", "~\\n~", $row[$j]);

                                        if (isset($row[$j])) {
                                            $sql .= '"' . $row[$j] . '"';
                                        } else {
                                            $sql .= '""';
                                        }

                                        if ($j < ($fields - 1)) {
                                            $sql .= ",";
                                        }
                                    }

                                    $sql .= ");\r\n";
                                }
                            }
                            echo " <i class='fa fa-check-circle'></i> RESPALDO FINALIZADO<br><br>";
                        }

                        echo "<div class='alert alert-success' role='alert'>La base de datos se respaldó exitosamente</div>";
                    } catch (Exception $e) {
                        var_dump($e->getMessage());
                        return false;
                    }

                    return $this->saveFile($sql, $outputDir);
                }

                protected function saveFile(&$sql, $outputDir = ".")
                {
                    if (!$sql) return false;

                    try {
                        $handle = fopen($outputDir . "respaldos-" . $this->db . "-" . date("d-m-Y-H-m-i-s") . ".sql", "w-");
                        fwrite($handle, $sql);
                        fclose($handle);
                    } catch (Exception $e) {
                        var_dump($e->getMessage());
                        return false;
                    }
                    return true;
                }
            }

            $respaldo = new Database_Backup();
            $respaldo->Database_Backup(SERVIDOR, USUARIO, ACCESO, DB);
            $respaldo->backupTables(TABLES, DIRECTORIO);

            ?>
        </div>
    </div>
</div>

<?php
include "../assets/footer.php";
?>