<?php
session_start();

require_once "conexion.php";

$idp = $_SESSION['idpieza'];

$sql="SELECT pieza.* FROM pieza WHERE pieza.id=".$idp;

//die($_SESSION['clas']);
$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Agregar Datos de clasificacion</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <?php
        include('header.php');
        ?>

        <section>

            <div class="container mt-2 mb-5">
                <div class="text-center mt-5 mb-2 text-primary"><h2>Agregar datos de clasificacion</h2></div>	
                <div class="text-secondary"><p><small>* Datos obligatorios</small></p></div>

                <form class="row g-3"  method="post" action="insertar_datos_clasificacion.php" >
                    <input type="hidden" class="form-control" name="clas" id="clas" value="<?php echo $fila['clasificacion'];?>">

                    <div class="col-sm-6">
                        <label for="reino" class="form-label">Reino</label>
                        <input type="text" class="form-control" name="reino" id="reino" placeholder="Ingresar reino">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="phylum" class="form-label">Phylum</label>
                        <input type="text" class="form-control" name="phylum" id="phylum" placeholder="Ingresar phylum" >
                    </div>

                    <div class="col-sm-6">
                        <label for="clase" class="form-label">Clase</label>
                        <input type="text" class="form-control" name="clase" id="clase" placeholder="Ingresar clase">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="orden" class="form-label">Orden</label>
                        <input type="text" class="form-control" name="orden" id="orden" placeholder="Ingresar orden">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="familia" class="form-label">Familia</label>
                        <input type="text" class="form-control" name="familia" id="familia" placeholder="Ingresar familia">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="genero" class="form-label">Genero</label>
                        <input type="text" class="form-control" name="genero" id="genero" placeholder="Ingresar genero">
                    </div>
                    
                    <div class="col-sm-6">
                        <label for="especie" class="form-label">Especie</label>
                        <input type="text" class="form-control" name="especie" id="especie" placeholder="Ingresar especie">
                    </div>

                    <?php if($fila['clasificacion']=="zoologia"){ ?> 

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion" placeholder="Ejemplo invertebrados, vertebrados.." required >
                    </div>

                    <?php }else if($fila['clasificacion'] =="botanica"){ ?>
        
                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion" placeholder="Por ejemplo algas, briofitos, etc..." required >
                    </div>

                    <div class="col-sm-6">
                        <label for="division" class="form-label">* Division</label>
                        <input type="text" class="form-control" name="division" id="division" placeholder="" required >
                    </div>

                    <?php } else if($fila['clasificacion'] =="paleontologia"){ ?>

                    <div class="col-sm-6">
                        <label for="eras" class="form-label">* Eras</label>
                        <input type="text" class="form-control" name="eras" id="eras" placeholder="" required >
                    </div>

                    <div class="col-sm-6">
                        <label for="periodos" class="form-label">* Periodos</label>
                        <input type="text" class="form-control" name="periodos" id="periodos" placeholder="" required >
                    </div>

                    <?php }else if($fila['clasificacion'] =="arqueologia"){ ?>

                    <div class="col-sm-6">
                        <label for="integridadHistorica" class="form-label">* Integridad historica</label>
                        <input type="text" class="form-control" name="integridadHistorica" id="integridadHistorica" placeholder="Ingresar Integridad" required >
                    </div>

                    <div class="col-sm-6">
                        <label for="estetica" class="form-label">* Estetica</label>
                        <input type="text" class="form-control" name="estetica" id="estetica" placeholder="" required >
                    </div>

                    <div class="col-sm-6">
                        <label for="material" class="form-label">* Material</label>
                        <input type="text" class="form-control" name="material" id="material" placeholder="" required >
                    </div>

                    <?php }else if($fila['clasificacion']=="osteologia"){ ?>

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion" placeholder="" required >
                    </div>

                    <?php }else if($fila['clasificacion'] =="geologia"){ ?>

                    <div class="col-sm-6">
                        <label for="tipo" class="form-label">* Tipo</label>
                        <input type="text" class="form-control" name="tipo" id="tipo" placeholder="" required >
                    </div>

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion Rocas</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion" placeholder="Por ejemplo igneas, sedimentarias, etc..." required >
                    </div>

                    <?php }else if($fila['clasificacion']=="ictiologia"){ ?>

                    <div class="col-sm-6">
                        <label for="tipo" class="form-label">* Tipo</label>
                        <input type="text" class="form-control" name="tipo" id="tipo" placeholder="" required >
                    </div>

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion" placeholder="Por ejemplo marinos, agua dulce.." required >
                    </div>
        

                    <?php }else if($fila['clasificacion']=="oologia"){ ?>

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion" placeholder="" required >
                    </div>

                    <div class="col-sm-6">
                        <label for="tipo" class="form-label">* Tipo</label>
                        <input type="text" class="form-control" name="tipo" id="tipo" placeholder="" required >
                    </div>

                    <?php }; ?>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary btn-sm" name="btn_agregar" id="agregar">Enviar</button>
                        <a class="btn btn-primary btn-sm ms-2" href="listado_piezas.php" role="button">Cancelar</a>
                    </div>
                
                </form>
            
                <?php
                    // Uso de GET para mostrar Mensaje resultante 
                    if (isset($_GET["mensaje"])){
                        if($_GET["mensaje"]!="ok"){
                            echo "<div class='text-center mt-4 mb-5'><div class='alert alert-danger' role='alert'><strong>".$_GET["mensaje"]."</strong></div></div>"; 
                            }else{
                            echo "<div class='text-center mt-4 mb-5'><div class='alert alert-success' role='alert'><strong>Clasificacion exitosamente agregada!</strong><a href='listado_piezas.php' class='text-primary ms-3'>Volver al Listado</a></div></div>";  
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