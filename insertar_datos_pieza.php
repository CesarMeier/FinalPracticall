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

		// Validar que el numinventario no exista ya
		$numinventario = $_POST['numinventario'];
		$verificar_sql = "SELECT id FROM pieza WHERE numinventario = '$numinventario'";
		$verificar_result = mysqli_query($conex, $verificar_sql);

		if (mysqli_num_rows($verificar_result) > 0) {
			$error .= "El número de inventario ya existe. ";
			header("Location:form_agregar_pieza.php?mensaje=" . urlencode($error));
			exit();
		}

			// Subir imagen
			$imagenRuta = '';
			if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
				$nombreImagen = basename($_FILES['imagen']['name']);
				$rutaTemporal = $_FILES['imagen']['tmp_name'];
				$imagenRuta = 'imagenes/' . $nombreImagen;

				if (!file_exists('imagenes')) {
					mkdir('imagenes', 0777, true);
				}

				if (!move_uploaded_file($rutaTemporal, $imagenRuta)) {
					$error .= "Error al guardar la imagen. ";
					$imagenRuta = ''; // vacía para evitar errores en SQL
				}
			} else {
				$error .= "No se cargó imagen. ";
			}

			$sql = "INSERT INTO pieza(numinventario,especie,estadoconservacion,fecha_ingreso,cantidadpiezas,clasificacion,observacion,imagen,donante_id,usuario_id) VALUES ('" . $_POST['numinventario'] . "','" . $_POST['especie'] . "','" . $_POST['estadoconservacion'] . "','" . $_POST['fecha_ingreso'] . "','" . $_POST['cantidadpiezas'] . "','" . $_POST['clasificacion'] . "','" . $_POST['observacion'] . "','" . $imagenRuta . "','" . $ultimoid . "','" . $_SESSION['id_usu'] . "')";

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
