<?php
session_start();
if (!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnigerente'])) {
    header("Location: index.php");
    exit();
}
require_once "conexion.php";

if (!isset($_GET['msje'])){
    $id=$_POST['id'];
    $opcionSelec=$_POST['clasificacion'];
}else{
    $id=$_SESSION['idp'];
    $opcionSelec=$_SESSION['clasificacion'];
}   

$sql ="select * from pieza,".$opcionSelec." where (pieza.id=".$opcionSelec.".pieza_id) AND pieza_id=".$id;

$result=mysqli_query($conex,$sql); 

$fila=mysqli_fetch_array($result);
//die($sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Edición Datos de Clasificacion</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <?php
        include('header.php');
        ?>

        <section>
            <div class="container mt-2 mb-5">
                <div class="text-center my-5 text-success"><h2>Editar Datos Clasificacion</h2></div>	

                <form class="row g-3" action="editar_clasificacion.php" method="post">

                    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $fila['pieza_id'];?>">
                    <input type="hidden" class="form-control" name="clasi" id="clasi" value="<?php echo $fila['clasificacion'];?>">

                    <div class="col-sm-6">
                        <label for="reino" class="form-label">Reino</label>
                        <input type="text" class="form-control" name="reino" id="reino" value="<?php echo $fila['reino'];?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="clase" class="form-label">Clase</label>
                        <input type="text" class="form-control" name="clase" id="clase"  value="<?php echo $fila['clase'];?>">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="orden" class="form-label">Orden</label>
                        <input type="text" class="form-control" name="orden" id="orden"  value="<?php echo $fila['orden'];?>">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="familia" class="form-label">Familia</label>
                        <input type="text" class="form-control" name="familia" id="familia" value="<?php echo $fila['familia'];?>">
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label for="genero" class="form-label">Genero</label>
                        <input type="text" class="form-control" name="genero" id="genero"  value="<?php echo $fila['genero'];?>">
                    </div>
                    
                    <div class="col-sm-6">
                        <label for="especie" class="form-label">Especie</label>
                        <input type="text" class="form-control" name="especie" id="especie" value="<?php echo $fila['especie'];?>">
                    </div>

                    <?php if($opcionSelec=="zoologia"){ ?> 

                    <input type="hidden" class="form-control" name="idz" id="idz" value="<?php echo $fila['idz'];?>">

                    <div class="col-sm-6 mb-3">
                        <label for="phylum" class="form-label">* Phylum</label>
                        <input type="text" class="form-control" name="phylum" id="phylum"  value="<?php echo $fila['phylum'];?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion"  value="<?php echo $fila['distribucion'];?>">
                    </div>

                    <?php }else if($opcionSelec =="botanica"){ ?>
                
                    <input type="hidden" class="form-control" name="idb" id="idb" value="<?php echo $fila['idb'];?>">

                    <div class="col-sm-6 mb-3">
                        <label for="phylum" class="form-label">* Phylum</label>
                        <input type="text" class="form-control" name="phylum" id="phylum"  value="<?php echo $fila['phylum'];?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion"  value="<?php echo $fila['distribucion'];?>" >
                    </div>

                    <div class="col-sm-6">
                        <label for="division" class="form-label">* Division</label>
                        <input type="text" class="form-control" name="division" id="division"  value="<?php echo $fila['division'];?>">
                    </div>

                    <?php } else if($opcionSelec=="paleontologia"){ ?>
                
                    <input type="hidden" class="form-control" name="idp" id="idp" value="<?php echo $fila['idp'];?>">

                    <div class="col-sm-6">
                        <label for="eras" class="form-label">* Eras</label>
                        <input type="text" class="form-control" name="eras" id="eras"  value="<?php echo $fila['eras'];?>" >
                    </div>

                    <div class="col-sm-6">
                        <label for="periodos" class="form-label">* Periodos</label>
                        <input type="text" class="form-control" name="periodos" id="periodos"  value="<?php echo $fila['periodos'];?>" >
                    </div>

                    <?php }else if($opcionSelec =="arqueologia"){ ?>

                    <input type="hidden" class="form-control" name="ida" id="ida" value="<?php echo $fila['ida'];?>">

                    <div class="col-sm-6">
                        <label for="integridadHistorica" class="form-label">* Integridad historica</label>
                        <input type="text" class="form-control" name="integridadHistorica" id="integridadHistorica"  value="<?php echo $fila['integridadHistorica'];?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="estetica" class="form-label">* Estetica</label>
                        <input type="text" class="form-control" name="estetica" id="estetica" value="<?php echo $fila['estetica'];?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="material" class="form-label">* Material</label>
                        <input type="text" class="form-control" name="material" id="material" value="<?php echo $fila['material'];?>" >
                    </div>


                    <?php }else if($opcionSelec=="osteologia"){ ?>
            
                    <input type="hidden" class="form-control" name="idos" id="idos" value="<?php echo $fila['idos'];?>"> 

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion"  value="<?php echo $fila['distribucion'];?>" >
                    </div>

                    <?php }else if($opcionSelec=="geologia"){ ?>
            
                    <input type="hidden" class="form-control" name="idg" id="idg" value="<?php echo $fila['idg'];?>">

                    <div class="col-sm-6">
                        <label for="tipo" class="form-label">* Tipo</label>
                        <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $fila['tipo'];?>" >
                    </div>

                    <?php }else if($opcionSelec=="ictiologia"){ ?>
        
                    <input type="hidden" class="form-control" name="idi" id="idi" value="<?php echo $fila['idi'];?>">
                
                    <div class="col-sm-6">
                        <label for="tipo" class="form-label">* Tipo</label>
                        <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $fila['tipo'];?>" >
                    </div>

                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion"  value="<?php echo $fila['distribucion'];?>">
                    </div>
                
                    <?php }else if($opcionSelec=="oologia"){ ?>
                        
                    <input type="hidden" class="form-control" name="ido" id="ido" value="<?php echo $fila['ido'];?>">
                    
                    <div class="col-sm-6">
                        <label for="distribucion" class="form-label">* Clasificacion</label>
                        <input type="text" class="form-control" name="distribucion" id="distribucion"  value="<?php echo $fila['distribucion'];?>" >
                    </div>

                    <div class="col-sm-6">
                        <label for="tipo" class="form-label">* Tipo</label>
                        <input type="text" class="form-control" name="tipo" id="tipo"  value="<?php echo $fila['tipo'];?>" >
                    </div>

                    <?php }; ?>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success btn-sm" name="btn_editar_clasificacion" id="editar_clasificacion">Actualizar</button>
                        <a class="btn btn-danger btn-sm ms-2" href="listado_piezas.php" role="button">Cancelar</a>
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
        </section>

        <?php
        //  include('footer.php');
        ?>

        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/barra.js"></script>

    </body>
</html>