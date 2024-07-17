<?php
require_once "conexion.php";
//Funcion de Validacion de Datos
require_once "funcionesval.php";

$error = "";

if(!empty(trim($_POST['dni'])) && !empty(trim($_POST['nombre'])) && !empty(trim($_POST['apellido'])) && !empty(trim($_POST['telefono'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['clave']))){
	if (ValidacionUsuarios()){
		$dni = $_POST['dni'];
        $clave = $_POST['clave'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $fecha_registro = date("Y/m/d");
        $tipo_usuario = $_POST['tipo_usuario'];

        $clave=password_hash($_POST['clave'], PASSWORD_DEFAULT);
		$sql="INSERT INTO usuario(dni,clave,nombre,apellido,telefono,email,fecha_registro,tipo_usuario) VALUES('$dni','$clave','$nombre','$apellido','$telefono','$email','$fecha_registro','$tipo_usuario')";

        $result=mysqli_query($conex,$sql);

		if ($result){
            header("Location:form_registro.php?mensaje=ok");
        }else{ 
			$error.="Error en la Inserción de datos ";
			header("Location:form_registro.php?mensaje=".$error);
        }
	}else{
        header("Location:form_registro.php?mensaje=".$error);
    };
}else{
	$error.="Faltan Datos ";
	header("Location:form_registro.php?mensaje=".$error);
}
?>
