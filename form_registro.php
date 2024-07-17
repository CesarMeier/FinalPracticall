<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Agregar un Usuario</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <?php
        include('header.php');
        ?>

        <section>
            <div class="container mt-2 mb-5">
                <div class="text-center mt-5 mb-2 text-primary"><h2>Registrarse</h2></div>	

                <form class="row g-3"action="registro.php" method="post">

                    <div class="col-sm-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="">    
                    </div>

                    <div class="col-sm-6 mb-3">
                       <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="">    
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" name="dni" id="dni" placeholder="">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="fecha_ingreso" class="form-label">Fecha de Alta</label>
                        <input type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso" placeholder="">    
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    </div>

                    <div class="col-sm-6 mb-3"> 
                        <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
                        <select class="form-select " aria-label="Default select example" name="tipo_usuario">
                            <option selected disabled>Selecciona tu perfil</option>
                            <option value="gerente">Gerente</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="clave" class="form-label">Clave</label>
                        <input type="password" name="clave" id="clave" class="form-control" aria-describedby="passwordHelpBlock">
                        <div id="passwordHelpBlock" class="form-text"></div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm" name="btn_agregar" id="agregar">Agregar</button>
                        <a class="btn btn-primary btn-sm ms-2" href="listado_usuarios.php" role="button">Cancelar</a>
                    </div>

                </form>

                <?php
                // Uso de GET para mostrar Mensaje resultante 
                if (isset($_GET["mensaje"])){
                    if($_GET["mensaje"]!="ok"){
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
                    }else{
                        echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong> Exitosamente agregado!</strong><a href='listado_usuarios.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
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