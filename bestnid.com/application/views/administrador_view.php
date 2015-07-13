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
	</head>
	<body>
		<ul class="nav nav-pills nav-justified" style='background-color: #f5f5f5;'>
  			<li role="presentation"><a href="#">Consultar usuarios registrados</a></li>
  			<li role="presentation"><a href="#">Consultar subastas vendidas</a></li>
  			<li role="presentation"><a href="#">Crear una nueva categoria</a></li>
  			<li role="presentation"><a href="#">Eliminar una categoria</a></li>
		</ul>
		<p align="center">
			<a href="<?= base_url(index_page().'/index') ?>">
				<img src="<?= base_url('images/logo.png') ?>">
			</a>
		</p>
		<h1 align="center"> ¡Bienvenido a la sección de administrador de Bestnid! </h1>
		<!--<div class="row" height="100%">
			<div class="col-md-3">
				<ul class="nav nav-pills nav-stacked" style='background-color: #f5f5f5;'>
  					<li role="presentation"><a href="#">Home</a></li>
  					<li role="presentation"><a href="#">Profile</a></li>
  					<li role="presentation"><a href="#">Messages</a></li>
				</ul>
			</div>
		</div>-->
		<!-- Se cargan las funciones javascript de Bootstrap -->
    	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    	<!-- Este archivo le da estilo introduciendole bootstrap a la libreria dataTables mediante javascript -->
    	<script src="<?= base_url('js/dataTables.bootstrap.min.js') ?>" type="text/javascript" charset="utf8"></script>
	</body>
</html>