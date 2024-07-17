<?php
require_once "conexion.php";

$idpieza = $_POST['id'];
$opcionSelec = $_POST['clasificacion'];
$donante = $_POST['idd'];

$sql ="select * from ".$opcionSelec."where pieza_id=".$idpieza;

$result=mysqli_query($conex,$sql); 
$fila=mysqli_fetch_array($result);

switch($opcionSelec){
    case "zoologia":
        $sql="Delete from zoologia where idz".$fila['idz'];
        mysqli_query($conex,$sql);
        $sql="Delete from pieza where id=$idpieza";
        mysqli_query($conex,$sql);
        $sql="Delete from donante where idd=$donante";
        mysqli_query($conex,$sql);
    break;

    case "botanica":
        $sql="Delete from botanica where idb".$fila['idb'];
        mysqli_query($conex,$sql);
        $sql="Delete from pieza where id=$idpieza";
        mysqli_query($conex,$sql);
        $sql="Delete from donante where idd=$donante";
        mysqli_query($conex,$sql);
    break;

    case "paleontologia":
        $sql="Delete from paleontologia where idp".$fila['idp'];
        mysqli_query($conex,$sql);
        $sql="Delete from pieza where id=$idpieza";
        mysqli_query($conex,$sql);
        $sql="Delete from donante where idd=$donante";
        mysqli_query($conex,$sql);
    break;

    case "arqueologia":
        $sql="Delete from arqueologia where ida".$fila['ida'];
        mysqli_query($conex,$sql);
        $sql="Delete from pieza where id=$idpieza";
        mysqli_query($conex,$sql);
        $sql="Delete from donante where idd=$donante";
        mysqli_query($conex,$sql);
    break;

    case "osteologia":
        $sql="Delete from osteologia where idos".$fila['idos'];
        mysqli_query($conex,$sql);
        $sql="Delete from pieza where id=$idpieza";
        mysqli_query($conex,$sql);
        $sql="Delete from donante where idd=$donante";
        mysqli_query($conex,$sql);
    break;

    case "geologia":
        $sql="Delete from geologia where idg".$fila['idg'];
        mysqli_query($conex,$sql);
        $sql="Delete from pieza where id=$idpieza";
        mysqli_query($conex,$sql);
        $sql="Delete from donante where idd=$donante";
        mysqli_query($conex,$sql);
    break;

    case "ictiologia":
        $sql="Delete from ictiologia where idi".$fila['idi'];
        mysqli_query($conex,$sql);
        $sql="Delete from pieza where id=$idpieza";
        mysqli_query($conex,$sql);
        $sql="Delete from donante where idd=$donante";
        mysqli_query($conex,$sql);
    break;

    case "oologia";
        $sql="Delete from oologia where ido".$fila['ido'];
        mysqli_query($conex,$sql);
        $sql="Delete from pieza where id=$idpieza";
        mysqli_query($conex,$sql);
        $sql="Delete from donante where idd=$donante";
        mysqli_query($conex,$sql);
    break;
}

/* En la Base de Datos en Vista de Relaciones de la Tabla , aplicar 
el atributo ON Cascade Delete para la relacion entre pieza y donante */

//die($sql);

header("Location:listado_piezas.php");
?>