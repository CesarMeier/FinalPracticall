<?php
session_start();

require_once "conexion.php";

require_once "funcionesval.php";

$error = "";

$idpieza = $_POST['id'];
$opcionSelec=$_POST['clasi'];

$_SESSION['idp']=$idpieza;
$_SESSION['clasificacion']=$opcionSelec;


//Funcion de Validacion de Datos VALIDACION DATOS DE LA TABLA 
if (ValidacionDatos()){
        
    $distribucion= $_POST['distribucion'];
    $reino = $_POST['reino'];
    $phylum= $_POST['phylum'];
    $clase = $_POST['clase'];
    $orden = $_POST['orden'];
    $familia = $_POST['familia'];
    $genero = $_POST['genero'];
    $especie = $_POST['especie'];

	$division = $_POST['division']; //botanica
	$eras = $_POST['eras']; //Paleontologia
    $periodos = $_POST['periodos'];//Paleontologia

	$integridadHistorica = $_POST['integridadHistorica']; //Arqueologia
    $estetica = $_POST['estetica']; //Arqueologia
    $material = $_POST['material']; //Arqueologia

	$tipo = $_POST['tipo'];//geologia y ictiologia y oologia



    switch($opcionSelec){
		
        case "zoologia":
			$idz = $_POST['idz'];
            $sql="UPDATE zoologia SET distribucion='$distribucion',reino='$reino',phylum='$phylum',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie' WHERE idz=".$idz;
        break;

        case "botanica":
			$idb = $_POST['idb'];
            $sql="UPDATE zoologia SET distribucion='$distribucion',reino='$reino',phylum='$phylum',division='$division',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie' WHERE idb=".$idb;
        break;

        case "paleontologia":
			$idp = $_POST['idp'];
            $sql="UPDATE paleontologia SET eras='$eras',periodos='$periodos',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie') WHERE idp=".$idp;
        break;

        case "arqueologia":
			$ida = $_POST['ida'];
            $sql="UPDATE arqueologia SET integridadHistorica='$integridadHistorica',estetica='$estetica,material='$material',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie') WHERE ida=".$ida;
        break;

        case "osteologia":
			$idos = $_POST['idos'];
            $sql="UPDATE osteologia SET distribucion='$distribucion',especie='$especie',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero')  WHERE idos=".$idos;
        break;

        case "geologia":
			$idg = $_POST['idg'];
            $sql="UPDATE geologia SET tipo='$tipo',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie') WHERE idg=".$idg;
			break;

        case "ictiologia":
			$idi = $_POST['idi'];
            $sql="UPDATE ictiologia SET tipo='$tipo',distribucion='$distribucion',especie='$especie',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero') WHERE idi=".$idi;
        break;

        case "oologia";
			$ido = $_POST['ido'];
            $sql="UPDATE oologia distribucion='$distribucion,tipo='$tipo',especie='$especie',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero') WHERE ido=".$ido;
        break;
	}

    // Ejecuta la sentencia
    mysqli_query($conex,$sql);
		
    // Evalúa si se realizó la actualización de algun dato
    if (mysqli_affected_rows($conex)==1){

        header("Location:form_editar_clasificacion.php?msje=ok");

    }else{
	    $error.="No se realizó Actualización! ";
	    header("Location:form_editar_clasificacion.php?msje=".$error);
    }

};
    
	