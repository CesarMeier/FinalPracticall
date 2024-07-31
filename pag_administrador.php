<?php
session_start();
if(!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnigerente'])){
    //echo $_SESSION['dni'];
    header("location:index.php");
    }else if (isset($_SESSION['dnigerente'])){
        header("location:pag_gerente.php");
    }
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

        <?php
        include('header.php');
        ?>

        <section>

        <div class="container">
                <div  class="titulo_admi"> 
                    <p class="">Bienvenido Administrador <?php echo $_SESSION['nombreadministrador']." ".$_SESSION['apellidoadministrador'] ?>
                    !!</p>
                </div>
                
                <div class="carousel col-10 ">
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
                                    <p>Bienvenido Admi, espero entiendas esta bella pagina.!</p>
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