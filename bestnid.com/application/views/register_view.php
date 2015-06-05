<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
		<title>Registro de Bestnid</title>
	</head>
	<body>
		<p align="center">
			<a href="<?= base_url('/index.php/index') ?>">
				<img src="<?= base_url('images/logo.png') ?>">
			</a>
		</p>
		<h1 align="center">Bienvenido a Bestnid. Por favor, ingrese sus datos.</h1>
		<?= form_open('register/verificarDatos') ?>
		<?php
			$DNI = array('name' => 'DNI',
	 			'placeholder' => 'D.N.I',
	 			'required' => 'required'
	 			);
			
			$nombre = array('name' => 'nombre',
	 		'placeholder' => 'Nombre',
	 		'required' => 'required'
	 		);

 	 		$apellido = array('name' => 'apellido',
	 			'placeholder' => 'Apellido',
	 			'required' => 'required'
	 			);
	 	
	 		$email = array('name' => 'email',
	 			'type' => 'email',
		 		'placeholder' => 'E-mail',
		 		'required' => 'required'
		 		);

	 		$password = array('name' => 'password',
	 			'placeholder' => 'Contraseña',
	 			'type' => 'password',
	 			'required' => 'required'
	 			);

	 		$password2 = array('name' => 'password2',
	 			'placeholder' => 'Repetir Contraseña',
	 			'type' => 'password',
	 			'required' => 'required'
	 			);

     		$direccion = array('name' => 'direccion',
	 			'placeholder' => 'Direccion'
	 			);
 	 
 	 		$telefono = array('name' => 'telefono',
	 			'placeholder' => 'Telefono'
	 			);
		?>
		<p align="center">

		<div class="row">
			<div class="col-md-5">
			</div>
			<div class="col-md-2">
				<div class="form-group">	
				<?=	form_input($DNI) ?>
				</div>
				<div class="form-group">	
				<?=	form_input($nombre) ?>
				</div>
				<div class="form-group">	
				<?=	form_input($apellido) ?>
				</div>
				<div class="form-group">	
				<?=	form_input($email) ?>
				</div>
				<div class="form-group">	
				<?=	form_input($password) ?>
				</div>
				<div class="form-group">	
				<?=	form_input($password2) ?>
				</div>
				<div class="form-group">	
				<?=	form_input($direccion) ?>
				</div>
				<div class="form-group">	
				<?=	form_input($telefono) ?>
				</div>

				<p align="left">
					<?=	form_submit('submit_reg', 'Registrarse') ?>
				</p>
			
			 </div>
		</div>
		</p>
		<?= form_close() ?>
		<!-- JQuery cargado de forma local (sin conexion a internet) -->
    	<script src="<?= base_url('js/jquery.js') ?>"></script>
    	<!-- Se cargan las funciones javascript de Bootstrap -->
    	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
	</body>
</html>