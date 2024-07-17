<?php
session_start();

// Conexion a la BD
require_once "conexion.php";
//Funcion de Validacion de Datos
require_once "funcionesval.php";

$error = "";

// Recibe el id oculto desde el form_editar
$id=$_POST['id'];

// Crea una variable de sesión llamada idp para guardar el id de la pieza recibida
$_SESSION['idp']=$id;

if(!empty(trim($_POST['numinventario'])) && !empty(trim($_POST['especie'])) && !empty(trim($_POST['estadoconservacion'])) && !empty(trim($_POST['cantidadpiezas'])) && !empty(trim($_POST['observacion']))){
	if (ValidacionDatos()){
		$numinventario = $_POST['numinventario'];
		$especie = $_POST['especie'];
		$estadoconservacion = $_POST['estadoconservacion'];
		$cantidadpiezas = $_POST['cantidadpiezas'];
		$observacion = $_POST['observacion'];
		
        // Se arma la sentencia SQL de Actualización 
        $sql="UPDATE pieza SET numinventario=$numinventario,especie='$especie',estadoconservacion='$estadoconservacion',cantidadpiezas=$cantidadpiezas,observacion='$observacion' WHERE id=$id";

        // Ejecuta la sentencia
        mysqli_query($conex,$sql);
		
        // Evalúa si se realizó la actualización de algun dato
        if(mysqli_affected_rows($conex)==1){
            header("Location:form_editar_pieza.php?msje=ok");
        }else{
	        $error.="No se realizó Actualización! ";
	        header("Location:form_editar_pieza.php?msje=".$error);
        }
	};
}else{
	$error.="Faltan Datos";
	header("Location:form_editar_pieza.php?msje=".$error);
}
?>