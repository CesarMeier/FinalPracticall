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
                <div class="text-center my-5 text-success"><h2>Editar Clave</h2></div>	

                <form class="row g-3" action="editar_clave.php" method="post">

                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $fila['id'];?>">

                    <div class="text-center">
                        <label for="clave" class="form-label">Editar Clave</label>
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Editar Clave">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success btn-sm" name="btn_editar" id="editar">Actualizar</button>
                        <a class="btn btn-danger btn-sm ms-2" href="listado_usuarios.php" role="button">Cancelar</a>
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
        //  include('footer.php');
        ?>

        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/barra.js"></script>
        
    </body>
</html>