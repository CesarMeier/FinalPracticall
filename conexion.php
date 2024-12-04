<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "museo_db";

// Intentar conectar a la base de datos
$conex = mysqli_connect($servidor, $usuario, $password, $bd);

// Verificar si la conexión fue exitosa
if (!$conex) {
    // Mostrar el mensaje de error con más detalles
    die("Error de conexión: " . mysqli_connect_error());
}

// Configurar la conexión para usar UTF-8
mysqli_set_charset($conex, "utf8");

?>