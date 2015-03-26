<?php
	//obtener los datos del formulario		

		$_SESSION['usuario']=$_REQUEST['usuario'];
		$_SESSION['password']=$_REQUEST['password'];
		
//echo $_SESSION['usuario'];
//	echo $_SESSION['password'];
		
	//hacemos conexion con la base de datos
	include("conectar.php");
	conectarBD();
	
	//hacemos un query para verificar si los datos son correctos
	if(isset($_SESSION['usuario']) && isset($_SESSION['password'])){
			
	$rs=mysql_query("select * from usuarios where idusuario='".$_SESSION['usuario']."' and password='".$_SESSION['password']."'");
	
	//comparamos las filas obtenidas y direccionamos
	if(mysql_num_rows($rs)!=0){
		$row=mysql_fetch_array($rs);
		$tipo=$row["tipousuario"];
		
		session_start();
		$_SESSION['usuario']=$_REQUEST['usuario'];
		$_SESSION['password']=$_REQUEST['password'];
		 $_SESSION["autentificado"]="si";
		 if($tipo=="cliente"){		 		
		echo "<script type=\"text/javascript\">
	     window.location='perfil.php';</script>";											 
              }
		  	else if($tipo=="administrador"){
		 echo "<script type=\"text/javascript\">
	     window.location='index.php';
		 
		 </script>";
				 }
				 
				 else{
					 echo "<script type=\"text/javascript\">
				     window.location='login.php';</script>";
					 
				 }

			}
		
		else{
		header("Location: login.php?errorusuario=si");
		}
			
			mysql_free_result($rs);
	}
	else{
		
		
		echo"Error";
	}
	
?>