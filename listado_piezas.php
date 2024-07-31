<?php
session_start();
require_once "conexion.php";
require_once "fpaginacion.php";

//Paginacion
$cantidadregistrosmax=contar_registros($conex);

if (isset($_POST["clb"]) && !empty($_POST["clb"])){
    $valor=$_POST["clb"];
    $sql="SELECT * FROM pieza,donante WHERE (donante.idd=pieza.donante_id) and (pieza.especie like '%$valor%') ";
    $result=mysqli_query($conex,$sql);
} else {
    if (!isset($_GET["pg"])){
        $pag=0;
        $result=paginacion($conex, $pag);
    }else{
        $pag=$_GET["pg"];
        $result=paginacion($conex, $pag);
    }
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado Piezas</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <?php
        include('header.php');
        ?>
        
        <section>
            <div class="container text-center">
                <div class="text-center mt-5 mb-3"><h3>Listado de Piezas</h3></div>
                
                <div class="container ">
                    <form class="d-flex" role="search" method="post" action="">
                        <input class="form-control me-2" type="search" placeholder="Buscar por especie" aria-label="Search" name="clb">
                        <button class="btn btn-outline-success" type="submit" name="busqueda">Buscar</button>
                    </form>
                </div>
            
                <table class="table table-striped table-hover"> 


                    <thead>
                        <tr>
                            <th scope="col">Num Inventario</th>
                            <th scope="col">Id</th>
                            <th scope="col">Especie</th>
                            <th scope="col">Estado de Conservacion</th>
                            <th scope="col">Fecha Ingreso</th>
                            <th scope="col">Cantidad de Piezas</th>
                            <th scope="col">Clasificacion</th>
                            <th scope="col">Observacion</th>
                            <th scope="col">Donante</th>
                            <th scope="col">Acciones</th>
                            <?php if (isset($_SESSION['dniadmin'])  || isset($_SESSION['dnigerente'])){ ?> 
                            <th scope="col">edicion</th>
                            <?php  }  ?> 
                        </tr>
                    </thead>
            
                    <?php if (mysqli_num_rows($result)>0){ ?>

                    <tbody>

                        <?php While ($fila=mysqli_fetch_array($result)){ ?>
                
                        <tr>    
                            <th scope="row"><?php echo $fila["numinventario"]; ?></th>
                            <td><?php echo $fila["id"]; ?></td>
                            <td><?php echo $fila["especie"]; ?></td>
                            <td><?php echo $fila["estadoconservacion"]; ?></td>
                            <td><?php echo $fila["fecha_ingreso"]; ?></td>
                            <td><?php echo $fila["cantidadpiezas"]; ?></td>
                            <td><?php echo $fila["clasificacion"]; ?></td>
                            <td><?php echo $fila["observacion"]; ?></td>
                            <td><?php echo $fila["nombre"]." ".$fila["apellido"]; ?></td>


                            <?php if(!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnigerente'])){ ?> 

                                <td>
                                    <div class="d-sm-inline-block"><form action="info_clasificacion.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
                                        <input type="hidden" name="clasificacion" value="<?php echo $fila['clasificacion'];?>">
                                        <button class="btn btn-outline-success btn-sm" type="submit" name="btninfo" id="btninfo">Info</button></form>
                                    </div>
                                </td>

                            <?php } else if (isset($_SESSION['dniadmin'])  || isset($_SESSION['dnigerente'])){ ?> 

                                <td>
                                    <div class="d-sm-inline-block"><form action="form_editar_pieza.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id'];$fila['clasificacion'];?>">
                                        <button class="btn btn-outline-success btn-sm" type="submit" name="btneditarpieza" id="btneditarpieza">Edi pie</button></form>
                                    </div>

                                    <div class="d-sm-inline-block"><form action="form_editar_clasificacion.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
                                        <input type="hidden" name="clasificacion" value="<?php echo $fila['clasificacion'];?>">
                                        <button class="btn btn-outline-success btn-sm" type="submit" name="btneditarclasi" id="btneditarclasi">Edi cla</button></form>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-sm-inline-block"><form action="form_eliminar_pieza.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id']; $fila['clasificacion'];$fila['donante_id'];?>">
                                        <button class="btn btn-outline-danger btn-sm" type="submit" name="btnborrar" id="btnborrar">Bor</button></form>
                                    </div>

                                    <div class="d-sm-inline-block"><form action="info_clasificacion.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
                                        <input type="hidden" name="clasificacion" value="<?php echo $fila['clasificacion'];?>">
                                        <button class="btn btn-outline-success btn-sm" type="submit" name="btninfo" id="btninfo">Info</button></form>
                                    </div>
                                </td>

                            <?php } ?>    

                        </tr>

                        <?php } ?>         
                    
                    </tbody>
                    
        
                </table>
            </div>

            <div class="container "> 
                <ul class="pagination justify-content-center">

                    <?php
                    
                        $itemspagina= ceil($cantidadregistrosmax/5);
                        $paginaActual= isset($_GET['pg']) ? $_GET['pg'] : 0;

                    //Pagina Anterior
                    if ($paginaActual > 0){
                        echo "<li class='page-item'><a class='page-link' href='listado_piezas.php?pg=".($paginaActual-1)."'><<</a></li>";
                    }

                    //Pagina Actual
                    if ($itemspagina>1){
                        echo "<li class='page-item'><a class='page-link' href='listado_piezas.php?pg=".$paginaActual."'>".($paginaActual+1)."</a></li>";
                        echo "<li class='page-item disabled'><a class='page-link' href='#'> de ".$itemspagina."</a></li>";
                    }else {
                        echo "<li class='page-item'><a class='page-link' href='listado_piezas.php?pg=".$paginaActual."'>".($paginaActual+1)."</a></li>";
                        echo "<li class='page-item disabled'><a class='page-link' href='#'> de 1</a></li>";
                    }

                    //Pagina Siguiente
                    if ($paginaActual < $itemspagina - 1){
                        echo "<li class='page-item'><a class='page-link' href='listado_piezas.php?pg=".($paginaActual+1)."'>>></a></li>";
                    }
                    
                    ?>

                </ul>
            </div>

            <?php
            }else{
                echo "</table></div>";
                echo "<div class='container text-center lead my-3 py-3'><div class='alert alert-danger my-5 py-4'><p><em>No existen Piezas! </em><a href='index.php' class='text-primary lead ms-2'>Volver</a></p></div></div>";
            }
            ?>  
        
        </section>    

        <?php
        include('footer.php');
        ?>

        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/barra.js"></script>

    </body>
</html>