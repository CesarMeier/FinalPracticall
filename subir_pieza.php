<?php
require_once "conexion.php";

// Subida de imagen
$nombreImagen = $_FILES['imagen']['name'];
$rutaTemporal = $_FILES['imagen']['tmp_name'];
$rutaDestino = 'imagenes/' . $nombreImagen;

// Mover imagen al servidor
move_uploaded_file($rutaTemporal, $rutaDestino);

// Guardar info en la BD (ejemplo básico)
$sql = "INSERT INTO pieza (imagen) VALUES ('$rutaDestino')";
mysqli_query($conex, $sql);

echo "Imagen subida con éxito.";
?>