<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Registro de Bestnid</title>
	</head>
	<body>
		<h1 align="center">Bienvenido a Bestnid. Por favor, ingrese sus datos.</h1>
		<?= form_open('register/verificarDatos') ?>
		<?php
			$DNI = array('name' => 'DNI',
	 			'placeholder' => 'D.N.I');
			
			$nombre = array('name' => 'nombre',
	 		'placeholder' => 'Nombre');

 	 		$apellido = array('name' => 'apellido',
	 			'placeholder' => 'Apellido');
	 	
	 		$email = array('name' => 'email',
		 		'placeholder' => 'E-mail');

	 		$password = array('name' => 'password',
	 			'placeholder' => 'Contraseña',
	 			'type' => 'password');

	 		$password2 = array('name' => 'password2',
	 			'placeholder' => 'Repetir Contraseña',
	 			'type' => 'password');

     		$direccion = array('name' => 'direccion',
	 			'placeholder' => 'Direccion');
 	 
 	 		$telefono = array('name' => 'telefono',
	 			'placeholder' => 'Telefono');
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
			<?=	form_submit('aceptar', 'Aceptar') ?>
		</p>
		<?= form_close() ?>
	</body>
</html>