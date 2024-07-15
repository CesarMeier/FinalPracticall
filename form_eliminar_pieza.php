<?php
session_start();
// Conexion a la Base de Datos 
require_once "conexion.php";

$idpieza=$_POST['id'];

$sql = "SELECT * FROM pieza WHERE id=".$idpieza;

//die($sql);

$result=mysqli_query($conex,$sql);

$fila=mysqli_fetch_array($result);


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar pieza</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


  <?php
    
    include('header.php');

  ?>
      
            
    
  <!-- Index.php contiene un Formulario de Confirmación Eliminacion--> 

  
  
  <section>
  
  
  <div class="container mt-2 mb-5">
  <div class="text-center mt-5 mb-2 text-danger"><h2>Borrar pieza</h2></div>	
  <div class="text-secondary"><p><small>* Dato Obligatorio</small></p></div>
  
  <form class="row g-3" action="eliminar_pieza.php" method="post">
  
  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $fila['id'];?>">
  <input type="hidden" class="form-control" name="clasificacion" id="clasificacion" value="<?php echo $fila['clasificacion'];?>">
  <input type="hidden" class="form-control" name="idd" id="idd" value="<?php echo $fila['donante_id'];?>">

  <div class="col-sm-6">
    <label for="numinventario" class="form-label">* Num Inventario</label>
    <input type="text" class="form-control" name="numinventario" id="numinventario" value="<?php echo $fila['numinventario'];?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="especie" class="form-label">* Especie</label>
    <input type="text" class="form-control" name="especie" id="especie" value="<?php echo $fila['especie'];?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="estadoconservacion" class="form-label">* Estado de conservacion</label>
    <input type="text" class="form-control" name="estadoconservacion" id="estadoconservacion" value="<?php echo $fila['estadoconservacion'];?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="fecha_ingreso" class="form-label">* Fecha Ingreso</label>
    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" value="<?php echo $fila['fecha_ingreso'];?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="cantidadpieza" class="form-label">* Cantidad de piezas</label>
    <input type="text" class="form-control" name="cantidadpieza" id="cantidadpieza"  value="<?php echo $fila['cantidadpiezas'];?>" disabled>
  </div>
  <div class="col-sm-6 mb-3">
    <label for="clasificacion" class="form-label">* Clasificacion</label>
    <input type="text" class="form-control" name="clasificacion" id="clasificacion"  value="<?php echo $fila['clasificacion'];?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="observacion" class="form-label">* Observacion</label>
    <input type="text" class="form-control" name="observacion" id="observacion" value="<?php echo $fila['observacion'];?>" disabled>
  </div>

  
  <div class="col-12 text-secondary text-center mt-4"><h5>¿Confirma la eliminación de esta pieza?</a></h5>
  <div class="text-center mt-0"><button type="submit" class="btn btn-primary btn-sm" name="btnborrar" id="btnborrar">Eliminar</button>
  <a class="btn btn-primary btn-sm" href="listado_piezas.php" role="button">Cancelar</a></div>	
  
  </div>
  
  </form>
  
    

  </section>

  <?php
 //   include('footer.php');
  ?>
  
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/barra.js"></script>

</body>

</html>