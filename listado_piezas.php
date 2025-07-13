<?php
session_start();
require_once "conexion.php";
require_once "fpaginacion.php";

$cantidadregistrosmax = contar_registros($conex);

if (isset($_GET["clasificacion"]) && !empty($_GET["clasificacion"])) {
    $clasificacion = mysqli_real_escape_string($conex, $_GET["clasificacion"]);
    $sql = "SELECT * FROM pieza 
            INNER JOIN donante ON donante.idd = pieza.donante_id 
            WHERE pieza.clasificacion = '$clasificacion'";
    $result = mysqli_query($conex, $sql);
} elseif (isset($_POST["clb"]) && !empty($_POST["clb"])) {
    $valor = mysqli_real_escape_string($conex, $_POST["clb"]);
    $sql = "SELECT * FROM pieza 
            INNER JOIN donante ON donante.idd = pieza.donante_id 
            WHERE (pieza.numinventario LIKE '%$valor%' OR pieza.especie LIKE '%$valor%' OR pieza.estadoconservacion LIKE '%$valor%' OR pieza.clasificacion LIKE '%$valor%' OR pieza.observacion LIKE '%$valor%' OR donante.nombre LIKE '%$valor%' OR donante.apellido LIKE '%$valor%')";
    $result = mysqli_query($conex, $sql);
} else {
    if (!isset($_GET["pg"])) {
        $pag = 0;
        $result = paginacion($conex, $pag);
    } else {
        $pag = $_GET["pg"];
        $result = paginacion($conex, $pag);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Piezas</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include('header.php'); ?>

<section class="container py-5">
    <div class="text-center mb-4">
        <h2 class="text-success">Listado de Piezas</h2>
    </div>

    <form class="d-flex justify-content-center mb-4" method="post">
        <input class="form-control w-50 me-2" type="search" name="clb" placeholder="Buscar...">
        <button class="btn btn-outline-success" type="submit" name="busqueda">Buscar</button>
    </form>

    <?php if (mysqli_num_rows($result) > 0): ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success">
                <tr class="text-center">
                    <th>Inventario</th>
                    <th>ID</th>
                    <th>Especie</th>
                    <th>Conservación</th>
                    <th>Ingreso</th>
                    <th>Cantidad</th>
                    <th>Clasificación</th>
                    <th>Observación</th>
                    <th>Donante</th>
                    <th>Acción</th>
                    <?php if (isset($_SESSION['dniadmin']) || isset($_SESSION['dnigerente'])): ?>
                        <th>Edición</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><?php echo $fila["numinventario"]; ?></td>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo $fila["especie"]; ?></td>
                    <td><?php echo $fila["estadoconservacion"]; ?></td>
                    <td><?php echo $fila["fecha_ingreso"]; ?></td>
                    <td><?php echo $fila["cantidadpiezas"]; ?></td>
                    <td><?php echo $fila["clasificacion"]; ?></td>
                    <td><?php echo $fila["observacion"]; ?></td>
                    <td><?php echo $fila["nombre"] . " " . $fila["apellido"]; ?></td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#infoModal" onclick="cargarDatos(<?php echo $fila['id']; ?>, '<?php echo $fila['clasificacion']; ?>')">Info</button>
                    </td>
                    <?php if (isset($_SESSION['dniadmin']) || isset($_SESSION['dnigerente'])): ?>
                    <td>
                        <div class="d-flex flex-column gap-1">
                            <form action="form_editar_pieza.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                <button class="btn btn-outline-secondary btn-sm w-100">Editar Pieza</button>
                            </form>
                            <form action="form_editar_clasificacion.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                <input type="hidden" name="clasificacion" value="<?php echo $fila['clasificacion']; ?>">
                                <button class="btn btn-outline-secondary btn-sm w-100">Editar Clasif</button>
                            </form>
                            <form action="form_eliminar_pieza.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                <button class="btn btn-outline-danger btn-sm w-100">Eliminar</button>
                            </form>
                        </div>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <nav>
        <ul class="pagination justify-content-center">
            <?php
            $itemspagina = ceil($cantidadregistrosmax / 5);
            $paginaActual = isset($_GET['pg']) ? $_GET['pg'] : 0;

            if ($paginaActual > 0) {
                echo "<li class='page-item'><a class='page-link' href='listado_piezas.php?pg=" . ($paginaActual - 1) . "'>&laquo;</a></li>";
            }
            echo "<li class='page-item active'><a class='page-link' href='#'>" . ($paginaActual + 1) . "</a></li>";
            echo "<li class='page-item disabled'><a class='page-link' href='#'> de $itemspagina</a></li>";
            if ($paginaActual < $itemspagina - 1) {
                echo "<li class='page-item'><a class='page-link' href='listado_piezas.php?pg=" . ($paginaActual + 1) . "'>&raquo;</a></li>";
            }
            ?>
        </ul>
    </nav>
    <?php else: ?>
        <div class="alert alert-warning text-center my-5">
            <p><strong>No existen piezas registradas.</strong></p>
            <?php if (isset($_SESSION['dniadmin']) || isset($_SESSION['dnigerente'])): ?>
                <a href="form_agregar_pieza.php" class="btn btn-success">Cargar la primera</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>

<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="infoModalLabel">Información de la pieza</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" id="contenidoModal">
                <p>Cargando información...</p>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/barra.js"></script>
<script>
function cargarDatos(id, clasificacion) {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("clasificacion", clasificacion);

    fetch("cargar_info_ajax.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(html => {
        document.getElementById("contenidoModal").innerHTML = html;
    })
    .catch(error => {
        console.error("Error cargando la info:", error);
        document.getElementById("contenidoModal").innerHTML = "<p class='text-danger'>Error cargando la información</p>";
    });
}
</script>
</body>
</html>
