<?php
include"conectar.php";
conectarBD();
include"seguridad.php";
error_reporting(0);

session_start();
$consultar=mysql_query("SELECT * FROM usuarios where idusuario='".$_SESSION['usuario']."'");
while($perfil=mysql_fetch_array($consultar)){                           
$imagen=$perfil['perfil'];//se le pone 'ruta' porque lleva el nombre/url del campo de la BD
//$tipo=$perfil['tipousuario'];
}


$modificar=$_REQUEST['modificar'];
$cancelar=$_REQUEST['cancelar'];

$archivo=$_FILES['perfil']['tmp_name'];//guarda el archivo
$ruta="assets/images/perfil";//nombre de la carpeta
$nombre=$_FILES['perfil']['name'];//contiene el nombre de la imagen
$rutacompleta=$ruta.$nombre;

if($nombre==null){
$rutacompleta=$imagen;	
}
else{
$rutacompleta=$ruta.$nombre;
}
//obtenemos los datos del formulario
$usuario=$_POST['usuario'];		
$password=$_POST['password'];
$nombreusuario=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$email=$_POST['email'];
move_uploaded_file($archivo,$rutacompleta);



$modificarsql=mysql_query("update usuarios set idusuario='".$usuario."',password='".$password."',nombre='".$nombreusuario."', apellidos='".$apellidos."', email='".$email."',perfil='".$rutacompleta."' where idusuario='".$usuario."'") 
or die("Error: ".mysql_error());	

if($modificarsql){
echo"<script type=\"text/javascript\">window.location='perfil.php'; alert('Se ha actualizado exitosamente.');</script>";		
}
else{
echo"<script type=\"text/javascript\">window.location='modificar.php'; alert('Error al actualizar informacion, asegurese de que los datos sean válidos e intentelo de nuevo.');</script>";		
}


?>