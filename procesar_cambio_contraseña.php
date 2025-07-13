<?php
session_start();
require_once "conexion.php";
require_once "funcionesval.php";


if (!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnigerente'])) {
    header("Location: index.php");
    exit();
}

// Verificar que llegan los datos
if (isset($_POST['nueva']) && isset($_POST['repetir'])) {
    $nueva = trim($_POST['nueva']);
    $repetir = trim($_POST['repetir']);

    // Validar la fortaleza de la contraseña
    if (!ValidarClave($nueva, $error)) {
        $formulario = (isset($_SESSION['dniadmin'])) ? 'editar_contraseña.php' : 'editar_contraseña.php';
        header("Location: $formulario?mensaje=$error");
        exit();
    }

    // Verificar que las contraseñas coincidan
    if ($nueva === $repetir) {
        $hash = password_hash($nueva, PASSWORD_DEFAULT);

        // Determinar tipo de usuario y redireccionamiento
        if (isset($_SESSION['dniadmin'])) {
            $dni = $_SESSION['dniadmin'];
            $pagina = "pag_administrador.php";
        } elseif (isset($_SESSION['dnigerente'])) {
            $dni = $_SESSION['dnigerente'];
            $pagina = "pag_gerente.php";
        } else {
            header("Location: index.php?mensaje=Sesión inválida.");
            exit();
        }

        // Actualizar contraseña
        $sql = "UPDATE usuario SET clave = '$hash' WHERE dni = '$dni'";

        if (mysqli_query($conex, $sql)) {
            header("Location: $pagina?mensaje=Contraseña actualizada con éxito.");
        } else {
            $error = mysqli_error($conex);
            header("Location: $pagina?mensaje=Error al actualizar: $error");
        }

    } else {
        // Detectar desde qué tipo de perfil vino el usuario para volver a mostrar el formulario correcto
        $formulario = (isset($_SESSION['dniadmin'])) ? 'editar_contraseña.php' : 'editar_contraseña.php';

        header("Location: $formulario?mensaje=Las contraseñas no coinciden.");
        exit();
    }
} else {
    header("Location: cambiar_contraseña.php?mensaje=Faltan campos obligatorios.");
}
?>