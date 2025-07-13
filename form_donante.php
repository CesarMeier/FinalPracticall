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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Agregar Pieza</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

    <?php
    include('header.php');
    ?>

    <section>
        <div class="container mt-2 mb-5">
            <div class="text-center mt-5 mb-2 text-primary"><h2>Agregar Donante</h2></div>	
            <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>

                <form class="row g-3" action="insertar_datos.php" method="post" enctype="multipart/form-data">

                    <div class="col-sm-6">
                        <label for="nombre" class="form-label">* Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresar Nombre" required>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="apellido" class="form-label">* Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresar Apellido" required>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="fecha" class="form-label">* Fecha</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingresar Fecha" required>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success btn-sm" name="btn_agregar" id="agregar">Agregar</button>
                        <a class="btn btn-danger btn-sm ms-2" href="listado_piezas.php" role="button">Cancelar</a>
                    </div>

                </form>
        
                <?php
                // Uso de GET para mostrar Mensaje resultante 
                if (isset($_GET["mensaje"])){
                    if($_GET["mensaje"]!="ok"){
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
                    }else{
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Donante exitosamente agregado!</strong><a href='listado.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
                    }  
                } 
                ?> 
        </div>
    </section>

    <?php
    //  include('footer.php');
    ?>
    
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/barra.js"></script>

    </body>
</html>