<?php
	//ESTE ARCHIVO VALIDA LA SESION DEL USUARIO
	session_start();		
	//comprobamos que el usuario esta autentificado
	if($_SESSION["autentificado"]!="si"){
		header("Location: login.php");
		exit();
		}


?>