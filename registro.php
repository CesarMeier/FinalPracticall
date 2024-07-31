<?php
require_once "conexion.php"; // Conexión a la base de datos
require_once "funcionesval.php"; // Funciones de validación

$error = "";

// Verificar que todos los campos necesarios estén presentes
if (!empty(trim($_POST['dni'])) && !empty(trim($_POST['nombre'])) && !empty(trim($_POST['apellido'])) && !empty(trim($_POST['telefono'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['clave']))) {
    
    if (ValidacionUsuarios()) {
        $dni = trim($_POST['dni']);
        $clave = $_POST['clave'];
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $telefono = trim($_POST['telefono']);
        $email = trim($_POST['email']);
        $fecha_registro = date("Y/m/d");
        $tipo_usuario = trim($_POST['tipo_usuario']);

        // Validar y encriptar la clave
        $clave = password_hash($clave, PASSWORD_DEFAULT);

        // Verificar si el DNI ya existe
        $sql_check = "SELECT COUNT(*) AS count FROM usuario WHERE dni = ?";
        $stmt_check = mysqli_prepare($conex, $sql_check);
        mysqli_stmt_bind_param($stmt_check, "s", $dni);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_bind_result($stmt_check, $count);
        mysqli_stmt_fetch($stmt_check);
        mysqli_stmt_close($stmt_check);

        if ($count > 0) {
            // DNI ya está registrado
            $error = "El DNI ya está registrado.";
            header("Location:form_registro.php?mensaje=" . urlencode($error));
        } else {
            // Insertar nuevo usuario
            $sql_insert = "INSERT INTO usuario (dni, clave, nombre, apellido, telefono, email, fecha_registro, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = mysqli_prepare($conex, $sql_insert);
            mysqli_stmt_bind_param($stmt_insert, "ssssssss", $dni, $clave, $nombre, $apellido, $telefono, $email, $fecha_registro, $tipo_usuario);

            if (mysqli_stmt_execute($stmt_insert)) {
                header("Location:form_registro.php?mensaje=ok");
            } else {
                $error = "Error en la inserción de datos: " . mysqli_error($conex);
                header("Location:form_registro.php?mensaje=" . urlencode($error));
            }
            mysqli_stmt_close($stmt_insert);
        }
    } else {
        header("Location:form_registro.php?mensaje=" . urlencode($error));
    }
} else {
    $error = "Faltan datos.";
    header("Location:form_registro.php?mensaje=" . urlencode($error));
}
// Cerrar la conexión
mysqli_close($conex);
?>