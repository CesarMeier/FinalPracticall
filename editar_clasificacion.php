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

    $reino = $_POST['reino'];
    $clase = $_POST['clase'];
    $orden = $_POST['orden'];
    $familia = $_POST['familia'];
    $genero = $_POST['genero'];
    $especie = $_POST['especie'];

    switch($opcionSelec){
		
        case "zoologia":
			$idz = $_POST['idz'];
            $distribucion= $_POST['distribucion'];
            $phylum= $_POST['phylum']; //zoologia botanica
            $sql="UPDATE zoologia SET distribucion='$distribucion',reino='$reino',phylum='$phylum',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie' WHERE idz=".$idz;
        break;

        case "botanica":
			$idb = $_POST['idb'];
            $distribucion= $_POST['distribucion'];
            $division = $_POST['division']; //botanica
            $phylum= $_POST['phylum']; //zoologia botanica
            $sql="UPDATE botanica SET distribucion='$distribucion',reino='$reino',phylum='$phylum',division='$division',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie' WHERE idb=".$idb;

        break;

        case "paleontologia":
			$idp = $_POST['idp'];           
            $eras = $_POST['eras']; //Paleontologia
            $periodos = $_POST['periodos'];//Paleontologia
            $sql="UPDATE paleontologia SET eras='$eras',periodos='$periodos',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie' WHERE idp=".$idp;
        break;

        case "arqueologia":
			$ida = $_POST['ida'];
            $integridadHistorica = $_POST['integridadHistorica']; //Arqueologia
            $estetica = $_POST['estetica']; //Arqueologia
            $material = $_POST['material']; //Arqueologia
            $sql="UPDATE arqueologia SET integridadHistorica='$integridadHistorica',estetica='$estetica',material='$material',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie' WHERE ida=".$ida;
        break;

        case "osteologia":
			$idos = $_POST['idos'];
            $distribucion= $_POST['distribucion'];
            $sql="UPDATE osteologia SET distribucion='$distribucion',especie='$especie',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero' WHERE idos=".$idos;
        break;

        case "geologia":
			$idg = $_POST['idg'];
            $tipo = $_POST['tipo'];//geologia y ictiologia y oologia
            $sql="UPDATE geologia SET tipo='$tipo',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero',especie='$especie' WHERE idg=".$idg;
			break;

        case "ictiologia":
			$idi = $_POST['idi'];
            $distribucion= $_POST['distribucion'];
            $tipo = $_POST['tipo'];//geologia y ictiologia y oologia
            $sql="UPDATE ictiologia SET tipo='$tipo',distribucion='$distribucion',especie='$especie',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero' WHERE idi=".$idi;
        break;

        case "oologia";
			$ido = $_POST['ido'];
            $distribucion= $_POST['distribucion'];
            $tipo = $_POST['tipo'];//geologia y ictiologia y oologia
            $sql="UPDATE oologia SET distribucion='$distribucion',tipo='$tipo',especie='$especie',reino='$reino',clase='$clase',orden='$orden',familia='$familia',genero='$genero' WHERE ido=".$ido;
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