<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
		<title>Bestnid</title>
	</head>
	<body>
		<!-- En total la tabla debe sumar 12 columnas -->
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-1">
  				<a href="">Categorías</a> <!-- Se ubica en columna 4 -->
  			</div>
  			<div class="col-md-1">
				<a href="">Contáctenos</a> <!-- Se ubica en columna 5 -->
			</div>
			<div class="col-md-2">
				<!-- Se ubica en columna 6 -->
				<p align="center">
					<img src="<?= base_url('images/logo.png') ?>">
				</p>
			</div>
			<div class="col-md-1"> <!-- Se ubica en columna 8 -->
				<a href="<?= base_url('/index.php/register') ?>">Registrarse</a>
			</div>
			<div class="col-md-2"> <!-- Se ubica en columna 9 -->
				<a href="<?= base_url('/index.php/login') ?>">Iniciar Sesión</a>
			</div>
			<div class="col-md-2">
			</div>
		</div>
		<h1 align="center">Bestnid</h1>
		<h2 align="center">Elegí con el corazón</h2>
		<br>
		<!--<form class="navbar-form navbar-left" role="search">-->
		<form class="form" role="search">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
  					<div class="form-group">
    					<input type="text" class="form-control" placeholder="Search">
  					</div>
  					<p align="center">
  						<button type="submit" class="btn btn-default">Buscar</button>
  					</p>
  				</div>
  			</div>
		</form>
		<!-- JQuery cargado de forma local (sin conexion a internet) -->
    	<script src="<?= base_url('js/jquery.js') ?>"></script>
    	<!-- Se cargan las funciones javascript de Bootstrap -->
    	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
	</body>
</html>