<!DOCTYPE html>
<html lang="en">
	<head>
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
			<?=	form_input($DNI) ?>
			<br>
			<?=	form_input($nombre) ?>
			<br>
			<?=	form_input($apellido) ?>
			<br>
			<?=	form_input($email) ?>
			<br>
			<?=	form_input($password) ?>
			<br>
			<?=	form_input($password2) ?>
			<br>
			<?=	form_input($direccion) ?>
			<br>
			<?=	form_input($telefono) ?>
			<br>
			<?=	form_submit('submit_reg', 'Registrarse') ?>
		</p>
		<?= form_close() ?>
	</body>
</html>