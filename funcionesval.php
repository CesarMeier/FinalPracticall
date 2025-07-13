<?php
function ValidacionDatos() {
	global $error;
	$var_bool=TRUE;
	// Validar el nombre, apellido, dni, edad, email, clave, otro
	return $var_bool;
}

function ValidacionUsuarios(&$error) {
    $var_bool = TRUE;
    $error = "";

    if (!isset($_POST['nombre']) || !preg_match("/^[a-zA-Z ]+$/", trim($_POST['nombre']))) {
        $error .= "Error nombre. ";
        $var_bool = FALSE;
    }

    if (!isset($_POST['apellido']) || !preg_match("/^[a-zA-Z ]+$/", trim($_POST['apellido']))) {
        $error .= "Error apellido. ";
        $var_bool = FALSE;
    }

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error .= "Error Email. ";
        $var_bool = FALSE;
    }

	if (!preg_match("/^(?=.*[A-Z])(?=.*\d).{8,}$/", $_POST['clave'])) {
		$error .= "Clave insegura: debe tener al menos una mayúscula y un número. ";
		$var_bool = FALSE;
	}

    if (!isset($_POST['dni']) || !preg_match("/^\d{8}$/", $_POST['dni'])) {
        $error .= "Error DNI. Debe contener exactamente 8 números. ";
        $var_bool = FALSE;
    }

    return $var_bool;
}

function ValidacionIngreso(){
	global $error;

	$var_bool=TRUE;

	if(preg_match("/[a-zA-Z]/",$_POST['dni']) || strlen($_POST['dni'])<>8){
		$error.="Error DNI ";
		$var_bool=FALSE;
	}

	if (strlen($_POST['clave'])<=8){
		$error.="Error Clave ";
		$var_bool=FALSE;
	}

	return $var_bool;
}

function ValidarClave($clave, &$error) {
    $esValida = true;

    if (strlen($clave) < 8) {
        $error .= "La contraseña debe tener al menos 8 caracteres. ";
        $esValida = false;
    }

    if (!preg_match('/[A-Z]/', $clave)) {
        $error .= "La contraseña debe incluir al menos una letra mayúscula. ";
        $esValida = false;
    }

    if (!preg_match('/[0-9]/', $clave)) {
        $error .= "La contraseña debe incluir al menos un número. ";
        $esValida = false;
    }

    return $esValida;
}
?>