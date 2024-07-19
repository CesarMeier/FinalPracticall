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

if(!empty(trim($_POST['dni'])) && !empty(trim($_POST['nombre'])) && !empty(trim($_POST['apellido'])) && !empty(trim($_POST['telefono'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['clave'])) && !empty(trim($_POST['fecha_registro'])) && !empty(trim($_POST['tipo_usuario']))){
	if (ValidacionDatos()){
		$dni = $_POST['dni'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$fecha_registro = date("Y/m/d");
		$tipo_usuario = $_POST['tipo_usuario'];

        $clave=password_hash($_POST['clave'], PASSWORD_DEFAULT);
		
		// Se arma la sentencia SQL de Actualización
        $sql="UPDATE usuario SET dni='$dni',nombre='$nombre',apellido='$apellido',telefono='$telefono',email='$email',clave='$clave',fecha_registro='$fecha_registro',tipo_usuario='$tipo_usuario' WHERE id=$id";    

        // Ejecuta la sentencia
        mysqli_query($conex,$sql);

		echo $dni,$nombre,$apellido;

        //die($sql);
		//echo $sql;

        // Evalúa si se realizó la actualización de algun dato
        if (mysqli_affected_rows($conex)==1){
            header("Location:form_editar_usuario.php?msje=ok");
        }else{
	        $error.="No se realizó Actualización! ";
	        header("Location:form_editar_usuario.php?msje=".$error);
        }
	};
}else{
	$error.="Faltan Datos ";
	header("Location:form_editar_usuario.php?msje=".$error);
}
?>