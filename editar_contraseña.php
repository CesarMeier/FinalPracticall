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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <div class="input-group">
                        <input type="password" name="nueva" id="clave" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Ingresa nueva contraseña" required>
                        <button class="btn btn-outline-secondary" type="button" id="boton-clave">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>
                    <div id="passwordHelpBlock" class="form-text"></div>
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


        <script src="js/viewpass.js"></script>
    </body>
</html>