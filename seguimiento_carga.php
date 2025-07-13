<?php
session_start();
if (!isset($_SESSION['dniadmin'])) {
    header("Location: index.php");
    exit();
}
require_once "conexion.php";

$sql = "SELECT pieza.id, pieza.numinventario, pieza.fecha_ingreso, 
               usuario.nombre AS nombre_usuario, usuario.apellido AS apellido_usuario 
        FROM pieza 
        JOIN usuario ON pieza.usuario_id = usuario.id 
        ORDER BY pieza.fecha_ingreso DESC";

$result = mysqli_query($conex, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento de Carga</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include('header.php'); ?>

<section>
    <div class="container mt-5 mb-5">
        <h2 class="text-center text-success mb-4">📊 Seguimiento de Carga de Piezas</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>ID Pieza</th>
                            <th>N° Inventario</th>
                            <th>Fecha de Ingreso</th>
                            <th>Usuario que Cargó</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $fila['id'] ?></td>
                                <td><?= htmlspecialchars($fila['numinventario']) ?></td>
                                <td><?= $fila['fecha_ingreso'] ?></td>
                                <td><?= htmlspecialchars($fila['nombre_usuario'] . " " . $fila['apellido_usuario']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center my-5">
                <h5>No se encontraron registros de carga de piezas.</h5>
            </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="listado_piezas.php" class="btn btn-outline-success">← Volver al Listado de Piezas</a>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>