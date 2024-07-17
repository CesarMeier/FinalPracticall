<?php
session_start();

require_once "conexion.php";

if (!isset($_GET['msje'])){
    $id=$_POST['id'];
}else{
    $id=$_SESSION['idu'];
}     

$sql="SELECT usuario.* FROM usuario WHERE usuario.id=".$id;

//die($sql);
//echo $sql;
$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Formulario Edición Datos</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>

		<?php
		include('header.php');
		?>

		<section>
			<div class="container mt-2 mb-5">
				<div class="text-center mt-5 mb-2 text-danger"><h2>Borrar Usuario</h2></div>	
			
				<form class="row g-3" action="eliminar_usuario.php" method="post">
				
					<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $fila['id'];?>">

					<div class="col-sm-6">
						<label for="numinventario" class="form-label">* Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="<?php echo $fila['nombre']." ".$fila['apellido'];?>" disabled>
					</div>

					<div class="col-sm-6 mb-3">
						<label for="dni" class="form-label">* DNI</label>
						<input type="text" class="form-control" name="dni" id="dni" placeholder="" value="<?php echo $fila['dni'];?>" disabled>
					</div>

					<div class="col-sm-6 mb-3">
						<label for="telefono" class="form-label">* Telefono</label>
						<input type="text" class="form-control" name="telefono" id="telefono" placeholder="" value="<?php echo $fila['telefono'];?>" disabled>
					</div>

					<div class="col-sm-6 mb-3">
						<label for="apellido" class="form-label">* Email</label>
						<input type="text" class="form-control" name="apellido" id="apellido" placeholder="" value="<?php echo $fila['email'];?>" disabled>
					</div>
					
					<div class="col-12 text-secondary text-center mt-4"><h5>¿Confirma la eliminación de este usuario?</a></h5>
						<div class="text-center mt-0"><button type="submit" class="btn btn-primary btn-sm" name="btnborrar" id="btnborrar">Eliminar</button>
						<a class="btn btn-primary btn-sm" href="listado_usuarios.php" role="button">Cancelar</a></div>	
					</div>
				
				</form>

				<?php
				if (isset($_GET["msje"])){
					if($_GET["msje"]!="ok"){
						echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["msje"]."</strong><a href='listado_usuarios.php' class='text-primary ms-3'>Volver al Listado</a></div></div>"; 
					}else{
						echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>"."Actualización Exitosa!"."</strong><a href='listado_usuarios.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
					}  
				} 
				?> 
				
			</div>
		</section>

		<?php
		//include('footer.php');
		?>

		<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="js/barra.js"></script>

	</body>

</html>