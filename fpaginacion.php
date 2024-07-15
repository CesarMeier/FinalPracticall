<?php

function contar_registros($conex){
    $sql="SELECT count(id) as cantidadtotal FROM pieza";
    $result=mysqli_query($conex,$sql);
    $fila=mysqli_fetch_assoc($result);
    return $fila['cantidadtotal'];

}

function paginacion($conex, $pag){
    $sql="SELECT * FROM pieza,donante WHERE (donante.id=pieza.donante_id) ORDER BY pieza.id LIMIT ".($pag*6).","."4";
    //die($sql) ;
    $result=mysqli_query($conex, $sql);
    return $result;
}



?>