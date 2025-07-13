<?php
session_start();
require_once "conexion.php";
require_once "funcionesval.php";

if (isset($_POST['btn_editar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Validar los datos
    if (!ValidacionUsuarios()) {
        // Redirigir al perfil correspondiente con el mensaje de error
        if (isset($_SESSION['dniadmin'])) {
            header("Location: pag_administrador.php?mensaje=$error");
        } elseif (isset($_SESSION['dnigerente'])) {
            header("Location: pag_gerente.php?mensaje=$error");
        } else {
            header("Location: index.php?mensaje=Usuario no identificado.");
        }
        exit();
    }

    $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', telefono='$telefono', email='$email' WHERE id=$id";

    if (mysqli_query($conex, $sql)) {

        // Actualizar variables de sesión según tipo de usuario
        if (isset($_SESSION['dniadmin'])) {
            $_SESSION['nombreadministrador'] = $nombre;
            $_SESSION['apellidoadministrador'] = $apellido;
            header("Location: pag_administrador.php?mensaje=¡Datos actualizados con éxito!");
        } elseif (isset($_SESSION['dnigerente'])) {
            $_SESSION['nombregerente'] = $nombre;
            $_SESSION['apellidogerente'] = $apellido;
            header("Location: pag_gerente.php?mensaje=¡Datos actualizados con éxito!");
        } else {
            header("Location: index.php?mensaje=Usuario no identificado.");
        }
    } else {
        $error = mysqli_error($conex);

        if (isset($_SESSION['dniadmin'])) {
            header("Location: pag_administrador.php?mensaje=Error al actualizar los datos: $error");
        } elseif (isset($_SESSION['dnigerente'])) {
            header("Location: pag_gerente.php?mensaje=Error al actualizar los datos: $error");
        } else {
            header("Location: index.php?mensaje=Error desconocido.");
        }
    }
} else {
    header("Location: index.php?mensaje=Acceso inválido al formulario.");
}
?>