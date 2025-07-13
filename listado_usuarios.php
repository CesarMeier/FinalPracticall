<?php
session_start();
require_once "conexion.php";
require_once "fpaginacion.php";

if (!isset($_SESSION['dniadmin'])) {
    header("location:index.php");
}

$cantidadregistrosmax = contar_registros_usuario($conex);

if (isset($_POST["clb"]) && !empty($_POST["clb"])) {
    $valor = $_POST["clb"];
    $sql = "SELECT * FROM usuario WHERE ((usuario.dni LIKE '%$valor%') OR (usuario.nombre LIKE '%$valor%') OR (usuario.apellido LIKE '%$valor%') OR (usuario.telefono LIKE '%$valor%') OR (usuario.email LIKE '%$valor%') OR (usuario.tipo_usuario LIKE '%$valor%'))";
    $result = mysqli_query($conex, $sql);
} else {
    $pag = isset($_GET["pg"]) ? $_GET["pg"] : 0;
    $result = paginacion_usuario($conex, $pag);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Usuarios</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .table td, .table th {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <section>
        <div class="container text-center">
            <div class="text-center mt-5 mb-3">
                <h3>Listado de Usuarios</h3>
            </div>

            <div class="container mb-4">
                <form class="d-flex" role="search" method="post" action="">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="clb">
                    <button class="btn btn-outline-success" type="submit" name="busqueda">Buscar</button>
                </form>
            </div>

            <div class="table-responsive mb-5">
                <table class="table table-striped table-hover table-bordered align-middle fs-6">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tipo de Usuario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <?php if (mysqli_num_rows($result) > 0) { ?>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <th scope="row"><?php echo $fila["dni"]; ?></th>
                            <td><?php echo $fila["nombre"]; ?></td>
                            <td><?php echo $fila["apellido"]; ?></td>
                            <td><?php echo $fila["telefono"]; ?></td>
                            <td><?php echo $fila["email"]; ?></td>
                            <td><?php echo $fila["tipo_usuario"]; ?></td>
                            <td>
                                <div class="d-flex flex-wrap gap-2 justify-content-center">
                                    <form action="form_editar_clave.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                        <button class="btn btn-outline-primary btn-sm" type="submit">Clave</button>
                                    </form>

                                    <form action="form_editar_usuario.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                        <button class="btn btn-outline-warning btn-sm" type="submit">Editar</button>
                                    </form>

                                    <form action="form_eliminar_usuario.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                        <button class="btn btn-outline-danger btn-sm" type="submit">Borrar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="container mb-5">
                <ul class="pagination justify-content-center">
                    <?php
                        $itemspagina = ceil($cantidadregistrosmax / 6);
                        $paginaActual = isset($_GET['pg']) ? $_GET['pg'] : 0;

                        if ($paginaActual > 0) {
                            echo "<li class='page-item'><a class='page-link' href='listado_usuarios.php?pg=" . ($paginaActual - 1) . "'>&laquo;</a></li>";
                        }

                        echo "<li class='page-item active'><a class='page-link' href='#'>" . ($paginaActual + 1) . "</a></li>";
                        echo "<li class='page-item disabled'><a class='page-link' href='#'> de $itemspagina</a></li>";

                        if ($paginaActual < $itemspagina - 1) {
                            echo "<li class='page-item'><a class='page-link' href='listado_usuarios.php?pg=" . ($paginaActual + 1) . "'>&raquo;</a></li>";
                        }
                    ?>
                </ul>
            </div>

            <?php } else { ?>
                </table>
                <div class="container text-center lead my-3 py-3">
                    <div class="alert alert-danger my-5 py-4">
                        <p><em>No existen Usuarios!</em> <a href='index.php' class='text-primary lead ms-2'>Volver</a></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/barra.js"></script>
</body>
</html>
