<?php
session_start();
require_once "conexion.php";

$id = $_POST['id'];
$clasificacion = $_POST['clasificacion'];

$sql = "SELECT * FROM pieza, $clasificacion WHERE (pieza.id = $clasificacion.pieza_id) AND pieza_id = $id";
$result = mysqli_query($conex, $sql);
$fila = mysqli_fetch_array($result);
?>

<?php if (isset($_SESSION['dniadmin']) || isset($_SESSION['dnigerente'])): ?>
    <div class="d-flex flex-wrap justify-content-start gap-2 mb-3">
        <!-- Botón de Generar PDF -->
        <form action="generar_pdf.php" method="get" target="_blank">
            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
            <input type="hidden" name="clasificacion" value="<?php echo $fila['clasificacion']; ?>">
            <button type="submit" class="btn btn-danger btn-sm">📄 Generar PDF</button>
        </form>

        <!-- Botón de Seguimiento de Cargas solo para admin -->
        <?php if (isset($_SESSION['dniadmin'])): ?>
            <a href="seguimiento_carga.php" class="btn btn-outline-success btn-sm">📊 Seguimiento de Cargas</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <?php if (!empty($fila['imagen'])): ?>
        <img src="<?php echo $fila['imagen']; ?>" alt="Imagen de la pieza" class="img-fluid rounded mb-3" style="max-height: 300px;">
    <?php else: ?>
        <p><em>No hay imagen disponible.</em></p>
    <?php endif; ?>

    <h4>Inventario Nº: <?php echo $fila['numinventario']; ?></h4>

    <ul class="list-group list-group-flush text-start">
        <li class="list-group-item"><strong>Reino:</strong> <?php echo $fila['reino']; ?></li>
        <li class="list-group-item"><strong>Clase:</strong> <?php echo $fila['clase']; ?></li>
        <li class="list-group-item"><strong>Orden:</strong> <?php echo $fila['orden']; ?></li>
        <li class="list-group-item"><strong>Familia:</strong> <?php echo $fila['familia']; ?></li>
        <li class="list-group-item"><strong>Género:</strong> <?php echo $fila['genero']; ?></li>
        <li class="list-group-item"><strong>Especie:</strong> <?php echo $fila['especie']; ?></li>
        <li class="list-group-item"><strong>Distribución:</strong> <?php echo $fila['distribucion']; ?></li>
    </ul>
</div>
