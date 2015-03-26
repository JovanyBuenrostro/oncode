<?php
session_start();
include"conectar.php";
conectarBD(); 					
$consultar=mysql_query("SELECT * FROM usuarios where idusuario='".$_SESSION['usuario']."'");
while($perfil=mysql_fetch_array($consultar)){                           
$imagen=$perfil['perfil'];//se le pone 'ruta' porque lleva el nombre/url del campo de la BD
$tipo=$perfil['tipousuario'];
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
					elseif($tipo=="administrador"){
					?>   
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src='<?php echo $imagen?>' alt='' class='perfilHeader' width="50px" height="52px"/><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="perfil.php">Mi perfil</a></li>
                            <li><a href="modificar.php">Editar Perfil</a></li>
                            <li><a href="opcionesadministrador.php">Opciones Administrativas</a></li>
							<li><a href="salir.php">Cerrar Sesi&oacute;n</a></li>
						</ul>
					</li>   
                    <?php
					} elseif($tipo=="cliente"){
					?>   
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src='<?php echo $imagen?>' alt='' class='perfilHeader' width="50px" height="52px"/><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="perfil.php">Mi perfil</a></li>
                            <li><a href="modificar.php">Editar Perfil</a></li>
                            
							<li><a href="salir.php">Cerrar Sesi&oacute;n</a></li>
						</ul>
					</li>   
                    <?php
					}else{
					?>		
                    <form method="post" action="login.php">
                    <input type="submit" class="logHead" value="Iniciar Sesión"/> 	          
                    </form>
                    <form method="post" action="register.php">
                    <input type="submit" class="registerHead" value="Regístrate ya"/> 	          
                    </form>
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

	<!-- Header -->
	<header id="head">
		<div class="container">
             <div class="heading-text">							
							<h1 class="animated flipInY delay1">Inicia tus cursos con <<span style="color:#1ed300">On</span>code> </h1>
							<p>Cursos de programaci&oacute;n, soporte t&eacute;cnico, bases de datos, html & css, java, android y mucho m&aacute;s.</p>
						</div>
            
					<div class="fluid_container">                       
                    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                        <div data-thumb="assets/images/slides/thumbs/img1.jpg" data-src="assets/images/slides/img1.jpg">
                            <h2>We develop.</h2>
                        </div> 
                        <div data-thumb="assets/images/slides/thumbs/img2.jpg" data-src="assets/images/slides/img2.jpg">
                        </div>
                        <div data-thumb="assets/images/slides/thumbs/img3.jpg" data-src="assets/images/slides/img3.jpg">
                        </div> 
                    </div><!-- #camera_wrap_3 -->
                </div><!-- .fluid_container -->
		</div>
	</header>
	<!-- /Header -->

  <div class="container">
    <div class="row">
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="assets/images/1.png" alt="" />
							</div><!--icon box top -->
							<h4>Cursos en l&iacute;nea</h4>
							<p>Java</p>
                            <p>Html & CSS</p>
                            <p>Android</p>
     						<p><a href="#"><em>M&aacute;s informaci&oacute;n</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="assets/images/2.png" alt="" />
							</div><!--icon box top -->
							<h4>Conoce nuestros integrantes</h4>
							<p></p>
     						<p><a href="#"><em>M&aacute;s informaci&oacute;n</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="assets/images/3.png" alt="" />
							</div><!--icon box top -->
							<h4>&Uacute;ltimas actualizaciones</h4>
							<p>Constantemente subiendo nuevos videos</p>
     						<p><a href="#"><em>M&aacute;s informaci&oacute;n</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="assets/images/4.png" alt="" />
							</div><!--icon box top -->
							<h4>Aprende</h4>
							<p>Aprende a programar en distintos lenguajes, aprende de manera f&aacute;cil con nuestro equipo <<span style="color:#1ed300">on</span>code></p>
     						<p><a href="#"><em>M&aacute;s informaci&oacute;n</em></a></p>
						</div><!--grey box -->
					</div><!--/span3-->
				</div>
    </div>
      <section class="news-box top-margin">
        <div class="container">
            <h2><span>Cursos gratuitos</span></h2>
            <div class="row">
				
                       <?php        		
                        $consultar=mysql_query("SELECT * FROM noticias ORDER BY fecha, hora DESC");
                        while($noticia=mysql_fetch_array($consultar)){     
                        $titulo=$noticia['titulo'];
						$fecha=$noticia['fecha'];
                        $hora=$noticia['hora'];
                        $desc=$noticia['descripcion'];
                        $imagen=$noticia['ruta'];//se le pone 'nombre' porque lleva el nombre/url del campo de la BD                                              
                        echo"
                <div class='col-lg-4 col-md-4 col-sm-12'>
                    <div class='newsBox'>
                        <div class='thumbnail'>
                        
                            <figure><img src=$imagen width='360px' height='150px' alt=''></figure>
                            <div class='caption maxheight2'>
                            <div class='box_inner'>
                                        <div class='box'>
                                            <p class='title'>$titulo</p>
                                            <p>$desc</p>
                                        </div>";
										}
										?>                                                                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                               
            </div>
        </div>
    </section>
   
  
	
      <section class="container">
      <div class="row">
      	<div class="col-md-8"><div class="title-box clearfix "><h2 class="title-box_primary">About Us</h2></div> 
        <p><span>Perspiciatis unde omnis iste natus error sit voluptatem. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus musull dui.</span></p>
        <p>Lorem ipsumulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus. Null dui. Fusce feugiat malesuada odio.</p><p>Lorem ipsumulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus. Null dui. Fusce feugiat malesuada odio.</p>
        <a href="#" title="read more" class="btn-inline " target="_self">read more</a> </div>
              
          
          <div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary">Up Coming Courses</h2></div> 
            <div class="list styled custom-list">
            <ul>
            <li><a title="Snatoque penatibus et magnis dis partu rient montes ascetur ridiculus mus." href="#">Mathematics and Computer Science</a></li>
            <li><a title="Fusce feugiat malesuada odio. Morbi nunc odio gravida at cursus nec luctus." href="#">Mathematics and Philosophy</a></li>
            <li><a title="Penatibus et magnis dis parturient montes ascetur ridiculus mus." href="#">Philosophy and Modern Languages</a></li>
            <li><a title="Morbi nunc odio gravida at cursus nec luctus a lorem. Maecenas tristique orci." href="#">History (Ancient and Modern)</a></li>
            <li><a title="Snatoque penatibus et magnis dis partu rient montes ascetur ridiculus mus." href="#">Classical Archaeology and Ancient History</a></li>
            <li><a title="Fusce feugiat malesuada odio. Morbi nunc odio gravida at cursus nec luctus." href="#">Physics and Philosophy</a></li>
            </ul>
            </div>
         </div>
      </div>
      </section>
      
    	 
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
	<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
      
	</script>
    
</body>
</html>
