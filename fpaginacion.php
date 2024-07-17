<?php
function contar_registros($conex){
    $sql="SELECT count(id) as cantidadtotal FROM pieza";
    $result=mysqli_query($conex,$sql);
    $fila=mysqli_fetch_assoc($result);
    return $fila['cantidadtotal'];
}

function paginacion($conex, $pag){
    $sql="SELECT * FROM pieza,donante WHERE (donante.idd=pieza.donante_id) ORDER BY pieza.id LIMIT ".($pag*5).","."5";
    //die($sql) ;
    $result=mysqli_query($conex, $sql);
    return $result;
}

function contar_registros_usuario($conex){
    $sql="SELECT count(id) as cantidadtotal FROM usuario";
    $result=mysqli_query($conex,$sql);
    $fila=mysqli_fetch_assoc($result);
    return $fila['cantidadtotal'];
}

function paginacion_usuario($conex, $pag){
    $sql="SELECT * FROM usuario ORDER BY usuario.id LIMIT ".($pag*3).","."3";
    //die($sql) ;
    $result=mysqli_query($conex, $sql);
    return $result;
}
?>