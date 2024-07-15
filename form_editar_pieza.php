<?php

session_start();

require_once "conexion.php";

if (!isset($_GET['msje'])){

    $id=$_POST['id'];

}else{

      $id=$_SESSION['idp'];
}   



//$sql="SELECT * FROM pieza, donante WHERE pieza.id=".$id;

$sql="SELECT pieza.*, donante.* FROM pieza,donante WHERE (donante.idd=pieza.donante_id) and pieza.id=".$id;

//die($sql);

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);

//die($sql);
//echo $sql;

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Edición Datos de Pieza</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


  <?php

    include('header.php');

  ?>


  <section>

  <div class="container mt-2 mb-5">
  <div class="text-center my-5 text-success"><h2>Editar Datos Pieza</h2></div>	

  <form class="row g-3" action="editar_pieza.php" method="post">

  <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $fila['id'];?>">
  <input type="hidden" class="form-control" name="clasificacion" id="clasificacion" value="<?php echo $fila['clasificacion'];?>">
  <input type="hidden" class="form-control" name="idd" id="idd" value="<?php echo $fila['donante_id'];?>">

  <div class="col-sm-6">
    <label for="nombre" class="form-label">* Nombre Donante</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $fila['nombre'];?>" disabled>
  </div>
  
  <div class="col-sm-6">
    <label for="apellido" class="form-label">* Apellido Donante</label>
    <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo $fila['apellido'];?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
    <label for="fecha" class="form-label">* Fecha Donante</label>
    <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fila['fecha'];?>" disabled>
  </div>

  <div class="col-sm-6 mb-3">
  <label for="numinventario" class="form-label">* Numero de Inventario</label>
    <input type="text" class="form-control" name="numinventario" id="numinventario" value="<?php echo $fila['numinventario'];?>">
  </div>

  <div class="col-sm-6">
    <label for="especie" class="form-label">* Especie</label>
    <input type="text" class="form-control" name="especie" id="especie"  value="<?php echo $fila['especie'];?>">
  </div>

  <div class="col-sm-6 mb-3">
    <label for="estadoconservacion" class="form-label">* Estado de conservacion</label>
    <input type="text" class="form-control" name="estadoconservacion" id="estadoconservacion" value="<?php echo $fila['estadoconservacion'];?>" >
  </div>

  <div class="col-sm-6 mb-3">
    <label for="fecha_ingreso" class="form-label">* Fecha de ingreso</label>
    <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso"  value="<?php echo $fila['fecha_ingreso'];?>" disabled>
  </div>

  <div class="col-sm-6">
    <label for="cantidadpiezas" class="form-label">* Cantidad de piezas</label>
    <input type="text" class="form-control" name="cantidadpiezas" id="cantidadpiezas" value="<?php echo $fila['cantidadpiezas'];?>">
  </div>

  <div class="col-sm-6 mb-3">
    <label for="clasificacion" class="form-label">* Clasificacion</label>
    <input type="text" class="form-control" name="clasificacion" id="clasificacion"  value="<?php echo $fila['clasificacion'];?>" disabled>
  </div>

  <div class="col-sm-6">
    <label for="observacion" class="form-label">* Observacion</label>
    <input type="text" class="form-control" name="observacion" id="observacion" value="<?php echo $fila['observacion'];?>">
  </div>



  <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary btn-sm" name="btn_editar_pieza" id="editar_pieza">Actualizar</button>
  <a class="btn btn-primary btn-sm ms-2" href="listado_piezas.php" role="button">Cancelar</a>
  </div>

  </form>

  

  <?php


    if (isset($_GET["msje"])){

      if($_GET["msje"]!="ok"){

        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["msje"]."</strong><a href='listado_piezas.php' class='text-primary ms-3'>Volver al Listado</a></div></div>"; 

        }else{

        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>"."Actualización Exitosa!"."</strong><a href='listado_piezas.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  

      }  
  } 
  ?> 

</section>

  <?php

  //  include('footer.php');

  ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/barra.js"></script>

</body>

</html>