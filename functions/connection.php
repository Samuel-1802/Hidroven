<!-- Conexión con la base de datos -->

<?php

// Objeto de conexion a DB
$conn = new mysqli("localhost", "root", "", "hidroven");

// Prueba de fallos
if ($conn -> connect_errno) {
    echo "Se ha producido un error en la conexión"; 
    exit();
} else {
    // echo "Conexión exitosa";
}

if (!mysqli_set_charset($conn, "utf8")) {
    // printf("Error loading character set utf8: %s\n", mysqli_error($conn));
} else {
    // printf("Current character set: %s\n", mysqli_character_set_name($conn));
}