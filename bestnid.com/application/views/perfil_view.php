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
		<title> Perfil </title>
	</head>
	<body>
		<div class = "navbar navbar-inverse navbar-static-top"> <!-- Otra buena es navbar-fixed-top, la cual se mantiene en la pantalla si scrolleas -->
			<div class="container-fluid">  <!-- Esto hace que el texto esté en los extremos de la pagina -->
				<button class="navbar-toggle" data-toggle"collapse" data-target= "navHeaderCollapse"> <!-- Esto es si se achica la pantalla, hace un cuadradito con 3 lineas -->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class= "navbar-collapse navHeaderCollapse"> 
					<a href="<?= base_url(index_page().'/categorias') ?>" class="navbar-brand"> Categorías </a> 
					<a href="<?= base_url('images/enConstruccion.jpg') ?>" class="navbar-brand"> Ayuda </a>
					<ul class="nav navbar-nav navbar-right">
						<?php
							if(isset($this->session->userdata['login'])) { ?>
								<a href="<?= base_url(index_page().'/perfil') ?>" class="navbar-brand">
									<?= $this->session->userdata['nombre'].' '.$this->session->userdata['apellido'] ?>
								</a>
								<a href="<?= base_url(index_page().'/logout') ?>" class="navbar-brand"> Cerrar Sesión </a>
						<?php
							}
							else { ?>
								<a href="<?= base_url(index_page().'/register') ?>" class="navbar-brand"> Registrarse </a>
								<a href="<?= base_url(index_page().'/login') ?>" class="navbar-brand"> Iniciar Sesión </a>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<p align="center">
			<a href="<?= base_url(index_page().'/index') ?>">
				<img src="<?= base_url('images/logo.png') ?>" title="Volver al inicio de Bestnid">
			</a>
		</p>
		<table style="width:100%">
  			<tr>
	  			<td width="14%">
		  			<!-- INICIO Elegant Accordion Menu -->
					<div id='cssmenu'>
						<ul>
				   			<li class=''>
				   				<a href="<?= base_url(index_page().'/perfil?opcion=informacion') ?>"><span> Información </span></a>
				   			</li>
				   			<li class='has-sub'><a href='#'><span> Mis subastas </span></a>
				      			<ul>
				         			<li><a href='<?= base_url(index_page().'/perfil?opcion=subastas_vigentes') ?>'><span> --> Vigentes </span></a></li>
				         			<li><a href='<?= base_url(index_page().'/perfil?opcion=subastas_finalizadas') ?>'><span> --> Finalizadas </span></a></li>
				      			</ul>
				   			</li>
				   			<li class=''>
				   				<a href="<?= base_url(index_page().'/perfil?opcion=misOfertas') ?>"><span> Mis ofertas </span></a>
				   			</li>
				   			<li class='has-sub'><a href='#'><span> Cuenta </span></a>
				      			<ul>
				         			<li class='last'><a href='<?= base_url(index_page().'/perfil/modificarDatosPersonales') ?>'><span> --> Modificar mis datos </span></a></li>
				         			<?php
				         				if($subastasPublicadas || $subastasOfertadas) { ?>
				         					<li class='last'><a href='<?= base_url(index_page().'/perfil/desactivarCuenta') ?>' onClick="return(alerta_desactivar_cuenta());"><span> --> Desactivar cuenta </span></a></li>
				      				<?php
				      					}
				      					else { ?>
				      						<li class='last'><a href='<?= base_url(index_page().'/perfil/desactivarCuenta') ?>' onClick="return(desactivar_cuenta());"><span> --> Desactivar cuenta </span></a></li>	
				      				<?php
				      					}
				      				?>
				      			</ul>
				   			</li>
						</ul>
					</div>
					<!-- FIN Elegant Accordion Menu -->
				</td>
				<td>
					<!-- Acá va un switch, el cual va a tomar un iframe, dependiendo de la opcion que se elija-->
					<?php 
						$accion = $this->input->get('opcion'); 
						switch ($accion) {
		 					case 'subastas_vigentes':
		 			?>
		 						<div class="row">
		 						<div class="col-md-8">
		 						</div>
				 					<iframe src="<?= base_url(index_page().'/perfil/subastasVigentes') ?>" width="100%" height="800px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');">
									</iframe>
								</div>
			 		<?php
		 						break;

		 					case 'subastas_finalizadas':
		 			?>
		 						<div class="row">
		 						<div class="col-md-8">
		 						</div>
				 					<iframe src="<?= base_url(index_page().'/perfil/subastasFinalizadas') ?>" width="100%" height="800px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');">
									</iframe>
								</div>
			 		<?php
		 						break;

		 					case 'misOfertas':
		 			?>
		 						<div class="row">
		 						<div class="col-md-8">
		 						</div>
				 					<iframe src="<?= base_url(index_page().'/perfil/misOfertas') ?>" width="100%" height="800px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');">
									</iframe>
								</div>
			 		<?php
		 						break;

		 					case 'modificarDatosPersonales':
		 			?>
		 						<div class="row">
		 						<div class="col-md-8">
		 						</div>
				 					<iframe src="<?= base_url(index_page().'/perfil/modificarDatosPersonales') ?>" width="100%" height="800px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');">
									</iframe>
								</div>
			 		<?php
		 						break;

		 					default:
		 			?>
				 					<iframe src="<?= base_url(index_page().'/perfil/informacion') ?>" width="100%" height="800px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');">
									</iframe>
		 			<?php
		 						break;
		 				}
			 		?>
				</td>
  			</tr>
		</table> 
		<!-- Se carga jquery --> 
		<script src="<?= base_url('js/jquery.js') ?>" type="text/javascript" charset="utf8"></script> 
		<!-- Se carga boostrap --> 
		<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    	<!-- Este archivo le da estilo introduciendole bootstrap a la libreria dataTables mediante javascript -->
    	<script src="<?= base_url('js/dataTables.bootstrap.min.js') ?>" type="text/javascript" charset="utf8"></script>
    	<!-- Este archivo hace que se pueda desplegar submenú al sidebar -->
  		<script src="<?= base_url('js/elegantAccordionMenu.js') ?>"></script>
	</body>
	<script type="text/javascript">
		// Script para que el tamaño del iframe sea dinámico
  		function iframeLoaded() {
      		var iFrameID = document.getElementById('idIframe');
      		if(iFrameID) {
            	iFrameID.height = "";
            	iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
      		}   
  		}

  		function desactivar_cuenta() {
            if(confirm('¿Esta seguro que desea desactivar su cuenta?') == true) {
                alert('¡Su cuenta ha sido desactivada!');
                return (true);
            }
            else {
                return (false);
            }
        }

        function alerta_desactivar_cuenta() {
        	alert('La cuenta no pudo ser desactivada debido a que tiene subastas publicadas o subastas ofertadas vigentes');
        	return (false);
        }
	</script>  
</html>