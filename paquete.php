<?php
include"conectar.php";
conectarBD();
include"seguridad";
//obtenemos los datos del form
$Si="Si";
$No="No";
$paquete=$_REQUEST['paquete'];

//ejecucion de la sentencia SQL
if($paquete==1){
$rs=mysql_query("insert into cursos values(idusuario='".$_SESSION['usuario']."',Java='".$Si."',Android='".$No."',HtmlyCss='".$No."')") or die("ERROR: ".mysql_error());
}
else if($paquete==2){	
$rs=mysql_query("insert into cursos values(idusuario='".$_SESSION['usuario']."',Java='".$Si."',Android='".$Si."',HtmlyCss='".$Si."')") or die("ERROR: ".mysql_error());
}


if($rs){

echo"<script type=\"text/javascript\">window.location='perfil.php'; alert('Se han agregado nuevos cursos, gracias por adquirir nuestros paquetes.');</script>";		
}
else{
echo"<script type=\"text/javascript\">window.location='register.php';alert('Ups algo salio mal, por favor intente de nuevo y verifique sus datos, gracias.');</script>";
}
$encontrado="false";
?>