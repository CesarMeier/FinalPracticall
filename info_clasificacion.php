<?php
session_start();
require_once "conexion.php";

if (!isset($_GET['msje'])){
  $id=$_POST['id'];
  $opcionSelec=$_POST['clasificacion'];
}else{
    $id=$_SESSION['idp'];
    $opcionSelec=$_SESSION['clasificacion'];
}   

$sql ="select * from pieza, ".$opcionSelec." where (pieza.id=".$opcionSelec.".pieza_id) AND pieza_id=".$id;

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
//die($sql);

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

        <?php
        include('header.php');
        ?>
            
            <div class="container mt-2 mb-5">

                <div class="card text-bg-light border-success text-center mt-5 mb-5">

                    <div class="card-header text-center text-success ">
                        <h2>Datos de la pieza numero: <?php echo $fila['numinventario'];?> </h2>
                    </div>
                
                    <form class="row g-4 justify-content-center mt-2" action="" method="post">

                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $fila['pieza_id'];?>">
                        <input type="hidden" class="form-control" name="clasi" id="clasi" value="<?php echo $fila['clasificacion'];?>">

                        <div class="row">
                            
                            <div class="col">
                                <ul class="list-group list-group-flush fw-bold  " >

                                <li class="list-group-item ">Reino:</li>
                                <li class="list-group-item">Clase:</li>
                                <li class="list-group-item">Orden:</li>
                                <li class="list-group-item">Familia:</li>
                                <li class="list-group-item">Genero:</li>
                                <li class="list-group-item">Especie:</li>

                                <?php if($opcionSelec=="zoologia"){ ?> 
                                <li class="list-group-item">Phylum: </li>
                                <li class="list-group-item">Clasificacion: </li>
                                <?php }else if($opcionSelec =="botanica"){ ?>
                                <li class="list-group-item">Phylum:</li>
                                <li class="list-group-item">Clasificacion:</li>
                                <li class="list-group-item">Division: </li>
                                <?php } else if($opcionSelec=="paleontologia"){ ?>
                                <li class="list-group-item">Eras: </li>
                                <li class="list-group-item">Periodos: </li>
                                <?php }else if($opcionSelec =="arqueologia"){ ?>
                                <li class="list-group-item">Integridad historica:</li>
                                <li class="list-group-item">Estetica:</li>
                                <li class="list-group-item">Material:</li>
                                <?php }else if($opcionSelec=="osteologia"){ ?>
                                <li class="list-group-item">Clasificacion:</li>
                                <?php }else if($opcionSelec=="geologia"){ ?>
                                <li class="list-group-item">Tipo:</li>
                                <li class="list-group-item">Clasificacion de rocas:</li>
                                <?php }else if($opcionSelec=="ictiologia"){ ?>
                                <li class="list-group-item">Tipo:</li>
                                <li class="list-group-item">Clasificacion:</li>
                                <?php }else if($opcionSelec=="oologia"){ ?>
                                <li class="list-group-item">Clasificacion:</li>
                                <li class="list-group-item">Tipo:</li>
                                <?php }; ?>
                            </div>
                            
                            <!-- Columna 2 -->
                            <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo $fila['reino'];?></li>
                                <li class="list-group-item"><?php echo $fila['clase'];?></li>
                                <li class="list-group-item"><?php echo $fila['orden'];?></li>
                                <li class="list-group-item"><?php echo $fila['familia'];?></li>
                                <li class="list-group-item"><?php echo $fila['genero'];?></li>
                                <li class="list-group-item"><?php echo $fila['especie'];?></li>

                                <?php if($opcionSelec=="zoologia"){ ?> 
                                <li class="list-group-item"><?php echo $fila['phylum'];?></li>
                                <li class="list-group-item"><?php echo $fila['distribucion'];?></li>
                                <?php }else if($opcionSelec =="botanica"){ ?>
                                <li class="list-group-item"><?php echo $fila['phylum'];?></li>
                                <li class="list-group-item"><?php echo $fila['distribucion'];?></li>
                                <li class="list-group-item"><?php echo $fila['division'];?></li>
                                <?php } else if($opcionSelec=="paleontologia"){ ?>
                                <li class="list-group-item"><?php echo $fila['eras'];?></li>
                                <li class="list-group-item"><?php echo $fila['periodos'];?></li>
                                <?php }else if($opcionSelec =="arqueologia"){ ?>
                                <li class="list-group-item"><?php echo $fila['integridadHistorica'];?></li>
                                <li class="list-group-item"><?php echo $fila['estetica'];?></li>
                                <li class="list-group-item"><?php echo $fila['material'];?></li>
                                <?php }else if($opcionSelec=="osteologia"){ ?>
                                <li class="list-group-item"><?php echo $fila['distribucion'];?></li>
                                <?php }else if($opcionSelec=="geologia"){ ?>
                                <li class="list-group-item"><?php echo $fila['tipo'];?></li>
                                <li class="list-group-item"><?php echo $fila['distribucion'];?></li>
                                <?php }else if($opcionSelec=="ictiologia"){ ?>
                                <li class="list-group-item"><?php echo $fila['tipo'];?></li>
                                <li class="list-group-item"><?php echo $fila['distribucion'];?></li>
                                <?php }else if($opcionSelec=="oologia"){ ?>
                                <li class="list-group-item"><?php echo $fila['distribucion'];?></li>
                                <li class="list-group-item"><?php echo $fila['tipo'];?></li>
                                <?php }; ?>
                            </div>
                        </div>
                    </ul>

                        <div class="col-12 text-center mb-4">
                            <a class="btn btn-success btn-sm ms-2" href="listado_piezas.php" role="button">Volver al Listado</a>
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

                </div>
            </div>
        </section>

        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/barra.js"></script>

    </body>
</html>