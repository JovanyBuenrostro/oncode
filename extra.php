<?php

		$_SESSION['usuario']=$_REQUEST['usuario'];
		$_SESSION['password']=$_REQUEST['password'];
//obtenemos los datos del form

$usuario=$_REQUEST['usuario'];	
$nombre=$_REQUEST['nombre'];	
$apellidos=$_REQUEST['apellidos'];
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];
$tipousuario=$_REQUEST['tipousuario'];
$perfil=$_REQUEST['perfil'];

$correcto="Se ha registrado correctamente, gracias por unirte.";
$error="Error al intentar registrarte, intentalo de nuevo, verfica tu conexión y tus datos, gracias.";

$rs=mysql_query("select * from usuarios where idusuario='".$_SESSION['usuario']."' and password='".$_SESSION['password']."'");
	
	//comparamos las filas obtenidas y direccionamos
	if(mysql_num_rows($rs)!=0){
		$row=mysql_fetch_array($rs);
		$tipo=$row["tipousuario"];
		
		session_start();
		$_SESSION['usuario']=$_REQUEST['usuario'];
		$_SESSION['password']=$_REQUEST['password'];
		 $_SESSION["autentificado"]="si";						 	 		
		 
	}else{
		
	}
//ejecucion de la sentencia SQL
$rs2=mysql_query("insert into usuarios values ('".$usuario."','".$nombre."','".$apellidos."','".$email."','".$password."','".$tipousuario."',null,'".$perfil."')") or die("ERROR: ".mysql_error());
if($rs){
echo "<script type=\"text/javascript\">alert('".$correcto."');</script>";
}
else{
echo "<script type=\"text/javascript\">alert('".$error."');</script>";
}
$encontrado="false";
?>















<?php
include"conectar.php";
conectarBD();
include"seguridad.php";

error_reporting(0);

//obtenemos los datos del formulario
$idusuario=$_REQUEST['idusuario'];		
$password=$_REQUEST['password'];
$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$email=$_REQUEST['email'];
$tipousuario=$_REQUEST['tipousuario'];

//obtenemos los botones
$guardar=$_REQUEST["guardar"];
$eliminar=$_REQUEST["eliminar"];
$cancelar=$_REQUEST["cancelar"];

//si el usuario presionó guardar, hacemos UPDATE
if($guardar!=null){

mysql_query("update usuarios set password='$password',nombre='$nombre', apellidos='$apellidos', email='$email', tipousuario=$tipousuario where idusuario='$idusuario'") or die("Error: ".mysql_error());

echo"<script type=\"text/javascript\">window.location='listado.php'; alert('Se ha actualizado exitosamente.');</script>";
}



//si el usuario presiono eliminar hacemos delete
else if($eliminar!=null){
mysql_query("delete from usuarios where idusuario='$idusuario'") or die("Error: ".mysql_error());

echo"<script type=\"text/javascript\">window.location='listado.php'; alert('Se ha eliminado exitosamente.');</script>";
}




//si presiono cancelar lo enviamos a home
else
{
echo"<script type=\"text/javascript\">window.location='listado.php';</script>";
}











  <?php 
			if($java=="Si" && $android=="Si" && $html=="Si"){
				
			?>
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Java</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
                
                <div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>HTML5/CSS3</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
             
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Android</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
			</div>
                            
                <?php 
			}elseif($java=="Si" && $android!="Si" && $html!="Si"){
			?>	
			<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Java</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
				 <?php 
			}elseif($java!="Si" && $android=="Si" && $html!="Si"){
			?>	
			<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Android</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
			</div>
            	 <?php 
			}elseif($java!="Si" && $android=="Si" && $html=="Si"){
			?>	
            <div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>HTML5/CSS3</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
                <?php 
				}else{
					
				}
				?>