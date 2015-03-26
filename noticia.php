<?php
session_start();
include"conectar.php";
conectarBD(); 					
$consultar=mysql_query("SELECT * FROM usuarios where idusuario='".$_SESSION['usuario']."'");
while($imagenperfil=mysql_fetch_array($consultar)){                           
$imagen=$imagenperfil['perfil'];//se le pone 'ruta' porque lleva el nombre/url del campo de la BD                                                 
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
	<title>Oncode</title>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 
    <script type="text/javascript" src="style/js/jquery-1.6.2.min.js"></script>
     <script>
            $(document).ready(function() {
                $("#formulario").submit(function() {

                    //validar que los campos no estén en blanco el id usuario 
                    if ($("#usuario").val().length == 0) {
                        $("#errorusuario").css("display", "inline");
                        $("#usuario").focus();
                        return false;
                    }
                    else {
                        $("#errorUsuario").css("display", "none");
                    }

                    //validamos el password
                    if ($("#password").val().length == 0) {
                        $("#errorpassword").css("display", "inline");
                        $("#password").focus();
                        return false;
                    }
                    else {
                        $("#errorPassword").css("display", "none");
                    }
                    return true;
                });
            });
        </script>
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
                    <h1>Reg&iacute;strate</h1>
                    <p></p>
                </div>
    </header>

	<!-- container -->
	<section class="container">

		<div class="row">
<br />
<br />
<br />
			<!-- Article main content -->
<div class="col-lg-10">
 <!-- Begin form -->
                    <form method="post" id="noticia" action="noticia2.php" enctype="multipart/form-data">

                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2" align="left">
                            <h1>Ingresar nueva noticia</h1> 
                            <h3>Para una visualiaci&oacute;n completa, seleccione una imagen con propiedades: </h3>
                            <p>Anchura: 360 pixeles</p>
                            <p>Altura: 150 pixeles</p>
                            </th>
                            </tr>  
                            </thead>
                            <!-- Fin del Encabezado de la tabla -->
                            <!-- Inicio de fila -->
                            <tr>
                                <td align="rigth">T&iacute;tulo:</td> 
                                <td align="left">
                                    <input type="text" id="titulo" name="titulo" maxlength="500" size="41" required autofocus placeholder="ej. Mi Título"/>
                                    <div id="errortitulo" style="display:none;color:red">
                                        Debes ingresar un t&iacute;tulo
                                    </div>
                                </td>      
                            </tr>
                            <!-- Fin de la fila -->

                            <!-- Inicio de fila -->
                            <tr>
                                <td align="rigth">Fecha:</td> 
                                <td align="left">
                                
                                    <input type="text" id="fecha" name="fecha" size="41" value="<?php echo date("Y-m-d")?>" readonly/>
                                    <div id="errorfecha" style="display:none;color:red">
                                        Debes seleccionar una fecha y hora.
                                    </div>
                                </td>      
                            </tr>
                            <!-- Fin de la fila -->
                             <!-- Inicio de fila -->
                            <tr>
                                <td align="rigth"></td> 
                                <td align="left">                                
                                    <input type="hidden" id="hora" name="hora" value="<?php echo date("H:i:s")?>"/>
                                </td>      
                            </tr>
                            <!-- Fin de la fila -->

                            <!-- Inicio de fila -->
                            <tr>
                                <td align="rigth">Descripci&oacute;n</td> 
                                <td align="left">
                                    <textarea cols="40" rows="10" name="desc" spellcheck="true" required>
                                    </textarea>
                                    <div id="errorarea" style="display:none;color:red">
                                        Debes ingresar la descripci&oacute;n
                                    </div>
                                </td>      
                            </tr>
                            <!-- Fin de la fila -->  
                             <!-- Inicio de fila -->
                            <tr>
                                <td align="rigth"><br/></td> 
                                <td align="left">             
                                    
                                </td>      
                            </tr>
                            <!-- Fin de la fila --> 
                            <!-- Inicio de fila -->
                            <tr>
                                <td align="rigth">Seleccione la imagen</td> 
                                <td align="left">             
                                    <!--<span class="btn btn-default btn-file">-->
                                    <input type="file" id="imagen" name="imagen" required/>
                                    <!--</span>-->
                                    <div id="errorimagen" style="display:none;color:red">
                                        Debes seleccionar una imagen
                                    </div>
                                </td>      
                            </tr>
                            <!-- Fin de la fila --> 
                            <!-- Inicio de fila -->
                            <tr>
                                <td align="rigth"><br/></td> 
                                <td align="left">                                                 
                                </td>      
                            </tr>
                            <!-- Fin de la fila --> 
                            <!-- Inicio de fila -->
                            <tr>
                                <td align="rigth"></td> 
                                <td align="left"> 
                                    <input type="submit" class='log' value="Agregar"/>
                                </td>      
                            </tr>
                            <!-- Fin de la fila -->

                        </table>
                    </form>


			<!-- Sidebar --><!-- /Sidebar -->

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
