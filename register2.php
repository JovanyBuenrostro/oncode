<?php
include"conectar.php";
conectarBD();

//obtenemos los datos del form
//$usuario=$_REQUEST['usuario'];
$_SESSION['usuario']=$_REQUEST['usuario'];
$_SESSION['password']=$_REQUEST['password'];	
$nombre=$_REQUEST['nombre'];	
$apellidos=$_REQUEST['apellidos'];
$email=$_REQUEST['email'];
//$password=$_REQUEST['password'];
$tipousuario=$_REQUEST['tipousuario'];
$perfil=$_REQUEST['perfil'];

$correcto="Se ha registrado correctamente, gracias por unirte.";
$error="Error al intentar registrarte, intentalo de nuevo, verfica tu conexión y tus datos, gracias.";
$no="No";
//ejecucion de la sentencia SQL
$rs=mysql_query("insert into usuarios values ('".$_SESSION['usuario']."','".$_SESSION['password']."','".$nombre."','".$apellidos."','".$email."','".$tipousuario."','','".$perfil."')") or die("ERROR: ".mysql_error());
//$rs2=mysql_query("insert into cursos values ('".$_SESSION['usuario']."','".$no."','".$no."','".$no."' ')") or die("ERROR: ".mysql_error());

if($rs){
session_start();
$_SESSION['usuario']=$_REQUEST['usuario'];
$_SESSION['password']=$_REQUEST['password'];
$_SESSION["autentificado"]="si";
echo"<script type=\"text/javascript\">window.location='perfil.php'; alert('".$correcto."');</script>";		
}
else{
echo"<script type=\"text/javascript\">window.location='register.php';alert('Ups algo salio mal, por favor intente de nuevo y verifique sus datos, gracias.');</script>";
}
$encontrado="false";
?>