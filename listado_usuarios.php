<?php
session_start();
require_once "conexion.php";

$sql="SELECT * FROM usuario ";

$result=mysqli_query($conex,$sql);
        
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
</head>

<body>
    
    <?php
        
        include('header.php');

    ?>
    
    <section>
    
    <div class="container text-center">
        <div class="text-center mt-5 mb-3"><h3>Listado de Usuarios</h3></div>


        <div class="container "> 
<form class="d-flex" role="search" method="post" action="">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="clb">
        <button class="btn btn-outline-success" type="submit" name="busqueda">Buscar</button>
    </form>
    </div>
    
        <table class="table table-striped table-hover"> 

            <thead>
                <tr>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo de Usuario</th>
                
                <th scope="col">Acciones</th>


                </tr>
            </thead>
        
            <?php
            if (mysqli_num_rows($result)>0){
            ?>

            <tbody>

            <?php

                While ($fila=mysqli_fetch_array($result)){
    
            ?>
        
            <tr>    
                <th scope="row"><?php echo $fila["dni"]; ?></th>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["apellido"]; ?></td>
                <td><?php echo $fila["telefono"]; ?></td>
                <td><?php echo $fila["email"]; ?></td>
                <td><?php echo $fila["tipo_usuario"]; ?></td>

                <td>
                <div class="d-sm-inline-block"><form action="form_editar_usuario.php" method="post">
		        <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
		        <button class="btn btn-outline-success btn-sm" type="submit" name="btneditar" id="btneditar">Editar</button></form>
                </div>

                <div class="d-sm-inline-block"><form action="form_eliminar_usuario.php" method="post">
		        <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
		        <button class="btn btn-outline-danger btn-sm" type="submit" name="btnborrar" id="btnborrar">Borrar</button></form>
                </div>
                </td>
            </tr>

            <?php
            }
            ?>         
            
            </tbody>
    
        </table></div>
	<?php
	    }else{

        echo "</table></div>";
        echo "<div class='container text-center lead my-3 py-3'><div class='alert alert-danger my-5 py-4'><p><em>No existen Usuarios! </em><a href='index.php' class='text-primary lead ms-2'>Volver</a></p></div></div>";
        }
	?>  
    
    
    </section>    

    <?php
//    include('footer.php');
    ?>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/barra.js"></script>
</body>
</html>