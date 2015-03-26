<?php
include"conectar.php";
conectarBD();

//obtenemos los datos del form	
$titulo=$_REQUEST['titulo'];	
$fecha=$_REQUEST['fecha'];
$hora=$_REQUEST['hora'];
$descripcion=$_REQUEST['desc'];

$archivo=$_FILES['imagen']['tmp_name'];//guarda el archivo
$ruta="assets/images/noticias";//nombre de la carpeta
$nombre=$_FILES['imagen']['name'];//contiene el nombre de la imagen
move_uploaded_file($archivo,$ruta."/".$nombre);
$ruta=$ruta."/".$nombre;

//$tipo_archivo = $_FILES['imagen']['type'];
//$tamano_archivo = $_FILES['imagen']['size'];

$correcto="Se ha registrado correctamente, gracias por unirte.";
$error="Error al intentar registrarte, intentalo de nuevo, verfica tu conexión y tus datos, gracias.";

try{
//ejecucion de la sentencia SQL
$rs=mysql_query("insert into noticias values ('','".$titulo."','".$fecha."','".$hora."','".$descripcion."','".$ruta."')") or die("ERROR: ".mysql_error());
if($rs){
echo"<script type=\"text/javascript\">window.location='noticia.php';</script>";
}
else{
echo"<script type=\"text/javascript\">window.location='noticia.php';alert('Ups algo salio mal, por favor intente de nuevo y verifique sus datos, gracias.');</script>";
}
$encontrado="false";

}
catch(Exception $e){
echo"<script type=\"text/javascript\">window.location='noticia.php';alert('Ups algo salio mal, por favor intente de nuevo y verifique sus datos, gracias. '".$e."'');</script>";	
}


?>