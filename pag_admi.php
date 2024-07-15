<?php
session_start();
if(!isset($_SESSION['dniadmi'])){
    header("location:index.php");
   }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<?php
    
    include('header.php');

?>



<section>

<div class="container">
<div class="row ms-5">
    <h2 class="text-center">Bienvenido Administrador!</h2>
    <div class="col-2"></div>
    <div class="col-8">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="imagenes/administradores.jpg" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
        <img src="imagenes/compañeros.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
        <img src="imagenes/compus.jpg" class="d-block w-100" alt="...">
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
</div>
    
</div>

</section>

<?php
    include('footer.php');
?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/barra.js"></script>

</body>

</html>