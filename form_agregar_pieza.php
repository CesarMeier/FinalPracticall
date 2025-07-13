<?php
session_start();

require_once "conexion.php";

$sql="SELECT donante.* FROM donante";

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
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
                <div class="text-center mt-5 mb-2 text-success"><h2>Agregar Pieza</h2></div>	
                <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>

                <form class="row g-3" action="insertar_datos_pieza.php" method="post" enctype="multipart/form-data">

                    <div class="col-sm-6">
                        <label for="nombre" class="form-label">* Nombre Donante</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresar Donante" required>
                    </div>
        
                    <div class="col-sm-6">
                        <label for="apellido" class="form-label">* Apellido Donante</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresar Donante" required>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="fecha" class="form-label">* Fecha Donante</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingresar Fecha" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="numinventario" class="form-label">* Numero de Inventario</label>
                        <input type="text" class="form-control" name="numinventario" id="numinventario" placeholder="Ingresar Número" required>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="especie" class="form-label">* Especie</label>
                        <input type="text" class="form-control" name="especie" id="especie" placeholder="Ingresar Especie" required>
                    </div>

                    <div class="col-sm-6 mb-3"> 
                        <label for="estadoconservacion" class="form-label">* Estado de Conservacion</label>
                        <select class="form-select " aria-label="Default select example" name="estadoconservacion">
                            <option selected>Seleccione Estado</option>
                            <option value="zoologia">Bueno</option>
                            <option value="botanica">Muy Bueno</option>
                            <option value="paleontologia">Excelente</option>
                            <option value="arqueologia">Malo</option>
                        </select>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="fecha_ingreso" class="form-label">* Fecha de Ingreso</label>
                        <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" placeholder="Ingresar Fecha Ingreso" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="cantidadpiezas" class="form-label">* Cantidad de Piezas</label>
                        <input type="text" class="form-control" name="cantidadpiezas" id="cantidadpiezas" placeholder="Ingresar Cantidad de Piezas" required>
                    </div>
                    
                    <div class="col-sm-6">
                        <label for="observacion" class="form-label">* Observacion</label>
                        <input type="text" class="form-control" name="observacion" id="observacion" placeholder="Ingresar Observacion" required>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="imagen" class="form-label">* Imagen de la pieza</label>
                        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
                    </div>

                    <div class="col-sm-6 mb-3"> 
                        <label for="clasificacion" class="form-label">* Clasificacion</label>
                        <select class="form-select " aria-label="Default select example" name="clasificacion">
                            <option selected>Seleccione clasificacion</option>
                            <option value="zoologia">Zoologia</option>
                            <option value="botanica">Botanica</option>
                            <option value="paleontologia">Paleontologia</option>
                            <option value="arqueologia">Arqueologia</option>
                            <option value="osteologia">Osteologia</option>
                            <option value="geologia">Geologia</option>
                            <option value="ictiologia">Ictiologia</option>
                            <option value="oologia">Oologia</option>
                        </select>
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
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Agregar detalles de clasificacion aqui!</strong><a href='form_agregar_clasificacion.php' class='text-primary ms-3'>Siguiente formulario</a></div></div>";  
                    }  
                } 
                ?> 

            </div>
        </section>

        <?php
          include('footer.php');
        ?>
        
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/barra.js"></script>

    </body>
</html>