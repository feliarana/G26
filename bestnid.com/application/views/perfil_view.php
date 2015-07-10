<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- Se cargan los estilos de bootstrap -->
    	<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
    	<!-- Se cargan los estilos de la libreria dataTables -->
    	<link href="<?= base_url('css/jquery.dataTables.min.css') ?>" rel="stylesheet" type="text/css">
    	<!-- Se cargan los estilos con bootstrap de la libreria dataTables -->
    	<link href="<?= base_url('css/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css">
    	<!-- Se cargan los estilos del Responsive Menu ==> http://cssmenumaker.com/blog/free-css-sidebar-menu-navigations -->
    	<link href="<?= base_url('css/elegantAccordionMenu.css') ?>" rel="stylesheet" type="text/css">

	</head>

<body>

		<!-- FUENTE DE LA navBar https://www.youtube.com/watch?v=qpWlaOeGZ_4 -->
			<div class = "navbar navbar-inverse navbar-static-top"> <!-- Otra buena es navbar-fixed-top, la cual se mantiene en la pantalla si scrolleas -->
				<div class="container-fluid">  <!--Esto hace que el texto esté en los extremos de la pagina-->
					<button class="navbar-toggle" data-toggle"collapse" data-target= "navHeaderCollapse"> <!--Esto es si se achica la pantalla, hace tres chirimbolos-->
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<div class= "navbar-collapse navHeaderCollapse"> 
						<a href="<?= base_url(index_page().'/categorias') ?>" class="navbar-brand">Categorías</a> 
						<a href="<?= base_url('images/enConstruccion.jpg') ?>" class="navbar-brand">Ayuda</a> 
						
						<ul class="nav navbar-nav navbar-right"> 													
										<?php
											if(isset($this->session->userdata['login'])) { ?>

														<li class = "dropdown"> 

																	<a href="#" class = "dropdown-toggle" data-toggle = "dropdown"> 
																		<b class="caret"> Perfil </b> 
																		<font size="4" color="red"> <?= $this->session->userdata['nombre']?> <?= $this->session->userdata['apellido'] ?> </font>
																	</a>
																	<ul class = "dropdown-menu">
																		 
																					<!-- MENU PERFIL -->

																					<div>
																						<ul>
																						   <li class='active'><a href='<?= base_url('/index.php/miPerfil') ?>'><span>Ver Perfil</span></a></li>
																						   <li class='active'><a href="<?= base_url('/index.php/logout') ?>">Cerrar Sesión</a></li>
																					</div>

																					<!-- FIN MENU PERIFL -->

																	</ul>

														</li>
													</a>											
										<?php
											}
											else { ?>
													<a href="<?= base_url('/index.php/register') ?>" class="navbar-brand">Registrarse</a>
													<a href="<?= base_url('/index.php/login') ?>" class="navbar-brand">Iniciar Sesión</a>
										<?php
											}
										?>
						</ul>
					</div>

				</div>
			</div>
		<!-- FIN NavBar -->


		<p align="center">
			<a href="<?= base_url(index_page().'/index') ?>">
				<img src="<?= base_url('images/logo.png') ?>">
			</a>
		</p>


<table style="width:100%">
  <tr>
	  	<td width="14%">
		  	<!-- INICIO Elegant Accordion Menu -->

				<div id='cssmenu'>
				<ul>
				   <li class='active'><a href="<?= base_url('index.php/miPerfil?solapa=informacion') ?>" ><span>Información</span></a></li>
				   <li class='has-sub'><a href='#'><span>Subastas</span></a>
				      <ul>
				         <li><a href='<?= base_url('index.php/miPerfil?solapa=subastas_publicadas') ?>'><span>-->Publicadas</span></a></li>
				         <li><a href='<?= base_url('index.php/miPerfil?solapa=ofertadas_publicadas') ?>'><span>-->Ofertadas</span></a></li>
				      </ul>
				   </li>
				   <li class='has-sub'><a href='#'><span>Cuenta</span></a>
				      <ul>
				         <li class='last'><a href='<?= base_url('index.php/miPerfil?solapa=modificarDatos') ?>'><span>-->Modificar mis datos</span></a></li>
				         <li class='last'><a href='<?= base_url('index.php/miPerfil?solapa=desactivarCuenta') ?>'><span>-->Desactivar cuenta</span></a></li>
				      </ul>
				   </li>
				</ul>
				</div>

				<!-- FIN Elegant Accordion Menu -->
		</td>
		<td>

		<!-- Acá va un switch, el cual va a tomar un iframe, dependiendo de la solapa que se elija-->
		<?php $idCategoria = $this->input->get('solapa'); 
		switch ($idCategoria) {
		 	case 'subastas_publicadas':
		 		?> 
			 		<iframe src="<?= base_url('index.php/perfil/perfil_subastas_publicadas') ?>" width="100%" height="800px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');">
						<p>Su navegador no soporta iframes.</p>
					</iframe>
			 	<?php
		 		break;

		 	case 'ofertadas':
		 		?> 
		 		<!--TODO-->
			 	<?php
		 	break;

		 	case 'modificarDatos':
		 		?> 
		 		<!--TODO-->
			 	<?php
		 	break;

		 	case 'desactivarCuenta':
		 		?> 
		 		<!--TODO-->
			 	<?php
		 	break;		 	

		 	default:
		 		?>
			 		<iframe src="<?= base_url('index.php/perfil/perfil_informacion') ?>" width="100%" height="800px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');">
						<p>Su navegador no soporta iframes.</p>
					</iframe>
		 		<?php
		 		break;
		 } 

			 ?>

			
		</td>

  </tr>
</table>
		


	
<!-- Script para que el tamaño del iframe sea dinámico -->
<script type="text/javascript">
  function iframeLoaded() {
      var iFrameID = document.getElementById('idIframe');
      if(iFrameID) {
            // here you can make the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
      }   
  }
</script>   
		<!-- Se carga jquery --> 
		<script src="<?= base_url('js/jquery.js') ?>" type="text/javascript" charset="utf8"></script> 
		<!-- Se carga boostrap --> 
		<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    	<!-- Este archivo le da estilo introduciendole bootstrap a la libreria dataTables mediante javascript -->
    	<script src="<?= base_url('js/dataTables.bootstrap.min.js') ?>" type="text/javascript" charset="utf8"></script>
    	<!-- Este archivo hace que se pueda desplegar submenú al sidebar -->
  		<script src="<?= base_url('js/elegantAccordionMenu.js') ?>"></script>
	</body>
</html>