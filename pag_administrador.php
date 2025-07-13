<?php
require_once "conexion.php";
session_start();
if(!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnigerente'])){
    //echo $_SESSION['dni'];
    header("location:index.php");
    }else if (isset($_SESSION['dnigerente'])){
        header("location:pag_gerente.php");
    }

$dni = $_SESSION['dniadmin']; // o el campo que tengas como clave

$sql = "SELECT * FROM usuario WHERE dni = '$dni'";
$result = mysqli_query($conex, $sql);
$fila = mysqli_fetch_assoc($result); // ← acá se cargan los datos del usuario
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio Administrador</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <?php include('header.php'); ?>

        <section>

            <div class="container">
                <h3 class="text-center">Bienvenido Administrador <?php echo $_SESSION['nombreadministrador']." ".$_SESSION['apellidoadministrador'] ?> !!</h3>

                <div class="carousel mb-3">
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/carousel/a.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Tus funciones en esta pagina son las siguientes</h5>
                                    <p>Bienvenido Administrador, espero entiendas esta bella pagina.!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/carousel/b.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Crear usuarios!</h5>
                                    <p>Podes crecarlos, editarlos y eliminarlos.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/carousel/c.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Crear piezas</h5>
                                    <p>Podes anexar piezas nuevas que ingresen al museo! Como tambien puedes editar sus datos tanto de pieza como de su clasificacion y eliminar todo el dato..</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/carousel/d.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Agregar donantes.</h5>
                                    <p>Cuando anexas una nueva pieza tambien estas incorporando el donante de la misma.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>  

                <div class="mb-3">
                    <form class="row g-3" action="editar_perfil.php" method="post">

                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $fila['id'];?>">

                        <div class="col-sm-6 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $fila['nombre'];?>">
                        </div>

                        <div class="col-sm-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Editar Apellido" value="<?php echo $fila['apellido'];?>">
                        </div>

                        <div class="col-sm-6">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Editar Telefono" value="<?php echo $fila['telefono'];?>">
                        </div>

                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Editar Email" value="<?php echo $fila['email'];?>">
                        </div>
                        
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success btn-sm" name="btn_editar" id="editar">Actualizar</button>
                            <a class="btn btn-danger btn-sm ms-2" href="pag_administrador.php" role="button">Cancelar</a>
                            <a href="editar_contraseña.php" class="btn btn-warning btn-sm">Cambiar Contraseña</a>
                        </div>

                        <?php
                        if (isset($_GET["mensaje"])) {
                            $mensaje = $_GET["mensaje"];
                            if ($mensaje !== "ok") {
                                echo "<div class='text-center mt-4 mb-3'><div class='alert alert-success' role='alert'><strong>$mensaje</strong></div></div>"; 
                            } else {
                                echo "<div class='text-center mt-4 mb-3'><div class='alert alert-success' role='alert'><strong>Acceso permitido!</strong><a href='pag_administrador.php' class='text-primary ms-3'>Volver al inicio</a></div></div>";
                            }
                        }
                        ?>


                    </form>
                </div>

            </div>     
        </section>

        <?php
        include('footer.php');
        ?>

        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/carousel.js"></script>
        <script src="js/barra.js"></script>

    </body>
</html>