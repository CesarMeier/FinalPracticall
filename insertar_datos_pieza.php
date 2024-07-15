<?php
session_start();

require_once "conexion.php";

require_once "funcionesval.php";

$error = "";

 //Funcion de Validacion de Datos VALIDACION DATOS DE LA TABLA DONANTE

if(!empty(trim($_POST['nombre'])) && !empty(trim($_POST['apellido'])) && !empty(trim($_POST['fecha']))){

	if (ValidacionDatos()){
        
		$nombre= $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$fecha = date("Y/m/d");
		
		$sql="INSERT INTO donante(nombre,apellido,fecha) VALUES('$nombre','$apellido','$fecha')";

        $result=mysqli_query($conex,$sql);

		//Inserta los datos de la pieza

		if ($result){
			
			$ultimoid=mysqli_insert_id($conex);
			
			$sql = "INSERT INTO pieza(numinventario,especie,estadoconservacion,fecha_ingreso,cantidadpiezas,clasificacion,observacion,donante_id,usuario_id) VALUES ('" . $_POST['numinventario'] . "','" . $_POST['especie'] . "','" . $_POST['estadoconservacion'] . "','" . $_POST['fecha_ingreso'] . "'," . $_POST['cantidadpiezas'] . ",'" . $_POST['clasificacion'] . "','" . $_POST['observacion'] . "'," . $ultimoid . "," . $_SESSION['id_usu'] . ")";

		
			$result=mysqli_query($conex,$sql);

			$ultimoidpieza=mysqli_insert_id($conex);
			
			$_SESSION['idpieza']=$ultimoidpieza;

			//die($_SESSION['idpieza']);
		

			
            header("Location:form_agregar_pieza.php?mensaje=ok");

        }else{
            
            $error.="Error en la Inserción de datos ";
            header("Location:index.php?mensaje=".$error);

        }
	
	}else{
		header("Location:form_agregar_pieza.php?mensaje=".$error);
	}
}else{

	$error.="Faltan Datos ";
	header("Location:form_agregar_pieza.php?mensaje=".$error);

}



?>
