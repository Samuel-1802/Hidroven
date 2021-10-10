<!-- Conexión con la base de datos -->

<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "hidroven";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>