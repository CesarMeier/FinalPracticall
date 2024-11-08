<?php
session_start();

// Conexion a la BD
require_once "conexion.php";
// Funcion de validación de datos
require_once "funcionesval.php";

$error = "";

// Recibe el id oculto desde el form_editar
if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $error .= "ID no recibido. ";
    header("Location: form_editar_usuario.php?msje=" . urlencode($error));
    exit();
}

$_SESSION['idu'] = $id;

// Validación de los campos del formulario
if (!empty(trim($_POST['dni'])) && !empty(trim($_POST['nombre'])) && !empty(trim($_POST['apellido'])) && !empty(trim($_POST['telefono'])) && !empty(trim($_POST['email'])) && !empty($_POST['fecha_registro']) && !empty(trim($_POST['tipo_usuario']))) {
    if (ValidacionDatos()) {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $fecha_registro = date("Y-m-d");
        $tipo_usuario = $_POST['tipo_usuario'];
        
        // Se prepara la sentencia SQL de actualización
        $stmt = $conex->prepare("UPDATE usuario SET dni=?, nombre=?, apellido=?, telefono=?, email=?, fecha_registro=?, tipo_usuario=? WHERE id=?");
        $stmt->bind_param("sssssssi", $dni, $nombre, $apellido, $telefono, $email, $fecha_registro, $tipo_usuario, $id);

        // Ejecuta la sentencia
        if ($stmt->execute()) {
            header("Location: form_editar_usuario.php?msje=ok");
        } else {
            $error .= "No se realizó la actualización: " . $stmt->error;
            header("Location: form_editar_usuario.php?msje=" . urlencode($error));
        }

        $stmt->close();
    } else {
        $error .= "Los datos no son válidos. ";
        header("Location: form_editar_usuario.php?msje=" . urlencode($error));
    }
} else {
    $error .= "Faltan Datos. ";
    header("Location: form_editar_usuario.php?msje=" . urlencode($error));
}
?>