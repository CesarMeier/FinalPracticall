<?php
session_start();

// Conexion a la BD
require_once "conexion.php";
//Funcion de Validacion de Datos
require_once "funcionesval.php";

$error = "";

// Recibe el id oculto desde el form_editar
$id=$_POST['id'];

// Crea una variable de sesión llamada ids para guardar el id del socio recibido 
$_SESSION['idu']=$id;

if(!empty($_POST['clave'])){
    if (ValidacionDatos()){
        $clave=password_hash($_POST['clave'], PASSWORD_DEFAULT);

        $sql="UPDATE usuario SET clave='$clave' WHERE id=$id";    

        // Ejecuta la sentencia
        mysqli_query($conex,$sql);

		//echo $dni,$nombre,$apellido;

        //die($sql);
		//echo $sql;

        // Evalúa si se realizó la actualización de algun dato
        if (mysqli_affected_rows($conex)==1){
            header("Location:form_editar_clave.php?msje=ok");
        }else{
	        $error.="No se realizó Actualización! ";
	        header("Location:form_editar_clave.php?msje=".$error);
        }
	};
}else{
	$error.="Faltan Datos ";
	header("Location:form_editar_clave.php?msje=".$error);
}
?>