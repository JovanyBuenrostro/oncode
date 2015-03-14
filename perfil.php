<?php
session_start();
include"conectar.php";
conectarBD();
include"seguridad.php";

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

$consultar=mysql_query("SELECT * FROM usuarios where idusuario='".$_SESSION['usuario']."'");
while($perfil=mysql_fetch_array($consultar)){                           
$imagen=$perfil['perfil'];//se le pone 'ruta' porque lleva el nombre/url del campo de la BD 
$nombre=$perfil['nombre'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Oncode es una empresa dedicada a realizar tutoriales, conferencias, cursos, podcast y mucho m&aacute;s, enfocadas a las TI. Oncode es para ti. Yo soy Oncode, y tu, ya lo eres?" />
    <!-- oncode -->
    <meta name="author" content="Oncode">
    <!-- Favicon-->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
	<title><?php echo $_SESSION['usuario']?></title>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php">
					<img src="assets/images/logo.jpg" alt="" width="100" height="80" class="logo"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="index.html">Home</a></li>
					<li><a href="about.html">Acerca</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="coursesjava.html">Java</a></li>
							<li><a href="courseshtmlcss.html">HTML & CSS</a></li>
							<li><a href="coursesandroid.html">Android</a></li>
							<li><a href="coursesmysql.html">MySQL</a></li>
                            <li><a href="coursessoporte.html">Soporte T&eacute;cnico</a></li>
						</ul>
					</li>
					<li><a href="price.html">Paquetes</a></li>
					<li><a href="videos.html">Blog</a></li>					
					<li><a href="contact.html">Contacto</a></li>
                    <li>                     
                    <?php					
					if($_SESSION["autentificado"]!="si"){					
					?>                    
                   <form method="post" action="login.php">
                    <input type="submit" class="logHead" value="Iniciar Sesión"/> 	          
                    </form>
                    <form method="post" action="register.php">
                    <input type="submit" class="registerHead" value="Regístrate ya"/> 	          
                    </form>
                    <?php
					}
					else{
					?>   
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src='<?php echo $imagen?>' alt='' class='perfilHeader' width="50px" height="52px"/><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="perfil.php">Mi perfil</a></li>
                            <li><a href="perfil.php">Editar Perfil</a></li>
							<li><a href="salir.php">Cerrar Sesi&oacute;n</a></li>
						</ul>
					</li>   
                    <?php
					}
					?>
                    </li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<header id="head" class="secondary">
            <div class="container">            
			  <div class="row panel">
				  <div class="col-xs-12">
						<h3><?php echo $nombre?></h3>
						<p>
							<img src="<?php echo $imagen?>" alt="" class="perfil">
						</p>
					</div>
				</div>                                       
                </div>
    </header>

	<!-- container -->
	<section class="container">

		<div class="row">

			<!-- Article main content -->
            <div id="courses">
		<section class="container">
			<h3>Development Courses</h3>
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Responsive Design</h3>
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
							<h3>Web Designing</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Web App Dev</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Data Base</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3>Mobile App Dev</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</div>
					</div>
				</div>
			</div>

		</section>
	</div>
            <!-- /Article -->			

		</div>
	</section>
	<!-- /container -->
 <footer id="footer">
 
		<div class="container">
   <div class="row">
  <div class="footerbottom">
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Course Categories
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li><a href="#">
                List of Technology 
              </a>
            </li>
            <li><a href="#">
                List of Business
              </a>
            </li>
            <li><a href="#">
                List of Photography
              </a>
            </li>
            <li><a href="#">
               List of Language
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Products Categories
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li> <a href="#">
                Individual Plans  </a>
            </li>
            <li><a href="#">
                Business Plans
              </a>
            </li>
            <li><a href="#">
                Free Trial
              </a>
            </li>
            <li><a href="#">
                Academic
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Browse by Categories
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li><a href="#">
                All Courses
              </a>
            </li>
            <li> <a href="#">
                All Instructors
              </a>
            </li>
            <li><a href="#">
                All Members
              </a>
            </li>
            <li>
              <a href="#">
                All Groups
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6"> 
            	<div class="footerwidget"> 
                         <h4>Contact</h4> 
                        <p>Lorem reksi this dummy text unde omnis iste natus error sit volupum</p>
            <div class="contact-info"> 
            <i class="fa fa-map-marker"></i> Kerniles 416  - United Kingdom<br>
            <i class="fa fa-phone"></i>+00 123 156 711 <br>
             <i class="fa fa-envelope-o"></i> youremail@email.com
              </div> 
                </div><!-- end widget --> 
    </div>
  </div>
</div>
			<div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="index.html">Home</a> | 
								<a href="about.html">About</a> |
								<a href="courses.html">Courses</a> |
								<a href="price.html">Price</a> |
								<a href="videos.html">Videos</a> |
								<a href="contact.html">Contact</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2014. Template by <a href="http://webthemez.com/" rel="develop">WebThemez.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
