<?php
session_start();
if (!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnigerente'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Cambiar Contraseña</h3>

        <?php
        if (isset($_GET["mensaje"])) {
            $mensaje = $_GET["mensaje"];
            $tipo = (str_contains($mensaje, "éxito") || $mensaje == "ok") ? "success" : "danger";
            echo "<div class='text-center mt-4 mb-3'><div class='alert alert-$tipo' role='alert'><strong>$mensaje</strong></div></div>";
        }
        ?>

        <form action="procesar_cambio_contraseña.php" method="post" class="row g-3">

            <div class="col-md-6 offset-md-3">
                <label for="nueva" class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" name="nueva" required>
            </div>

            <div class="col-md-6 offset-md-3">
                <label for="repetir" class="form-label">Repetir nueva contraseña</label>
                <input type="password" class="form-control" name="repetir" required>
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm">Guardar Contraseña</button>
                <a class="btn btn-secondary btn-sm ms-2" href="pag_administrador.php">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>