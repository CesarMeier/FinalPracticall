<?php
session_start();

require_once "conexion.php";

$error="";
                
        $dni= $_POST['dni'];
        $clave = $_POST['clave'];

            $sql="SELECT id,dni,clave,nombre,apellido,tipo_usuario FROM usuario where (dni='$dni')";

            $result=mysqli_query($conex,$sql);

            if (mysqli_num_rows($result)==1){   
                //die($sql);

                $fila=mysqli_fetch_array($result);

                if (password_verify($clave,$fila['clave'])){
                    //die($sql);
                    if ($fila['tipo_usuario']=="gerente"){
                        $_SESSION['id_usu']=$fila['id'];
                        $_SESSION['dnigerente']=$fila['dni'];
                        $_SESSION['nombregerente']=$fila['nombre'];
                        $_SESSION['apellidogerente']=$fila['apellido'];
                        $_SESSION['gerente']=$fila['tipo_usuario'];
    
                        header("Location:pag_gerente.php");
    
                    }else if ($fila['tipo_usuario']=="administrador"){
                        //die($sql);
                        $_SESSION['id_usu']=$fila['id'];
                        $_SESSION['dniadmin']=$fila['dni'];
                        $_SESSION['nombreadministrador']=$fila['nombre'];
                        $_SESSION['apellidoadministrador']=$fila['apellido'];
                        $_SESSION['administrador']=$fila['tipo_usuario'];
    
                        header("Location:pag_administrador.php");
                       
                    }

                }else{
                    $error.="Datos de acceso incorrectos, intente nuevamente";
                    header("Location:form_login.php?mensaje=".$error);
                }

                }else{
                        $error.="Datos de acceso incorrectos, intente nuevamente";
                        header("Location:form_login.php?mensaje=".$error);
                     }
//die($sql);
?>

