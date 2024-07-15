<?php
session_start();

require_once "conexion.php";

if (!isset($_GET['msje'])){
 
     $id=$_POST['id'];
 
 }else{
 
    $id=$_SESSION['idp'];
}     

$sql ="SELECT * FROM pieza,zoologia where (pieza.id=zoologia.pieza_id) and pieza.id=".$id;
die($sql);

$result=mysqli_query($conex,$sql);

$fila=mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    
<input type="hidden" class="form-control" name="idpieza" id="idpieza" value="<?php echo $fila['id'];?>">

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $fila["clasificacion"] ?></h6>
    <input type="text" class="form-control" name="numinventario" id="numinventario" placeholder="Ingresar Nro de Inventario" value="<?php echo $fila['clasificacion'];?>">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="js/barra.js"></script>

</body>
</html>