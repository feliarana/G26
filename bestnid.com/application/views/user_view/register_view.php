<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Registro de Bestnid</title>
	</head>

	<body>
	<h1 align="center">	Bienvenido a Bestnid. Por favor, ingrese sus datos. </h1>
	<?= form_open('usuarios/verificarDatos') ?>
	<?php

		$DNI = array('name'=>'DNI',
	 		'placeholder'=>'D.N.I');

 	 	$nombre = array('name'=>'nombre',
	 		'placeholder'=>'Nombre');

 	 	$apellido = array('name'=>'apellido',
	 		'placeholder'=>'Apellido');
	 	
	 	$email = array('name' => 'email',
	 		'placeholder' => 'E-mail ');

	 	$password= array('name'=>'password', // FALTA REINGRESE PASSWORD Y QUE VERIFIQUE QUE SEAN IGUALES
	 		'placeholder'=>'Contraseña',
	 		'type'=>'password'); 

     	$direccion = array('name'=>'direccion',
	 		'placeholder'=>'Direccion');
 	 
 	 	$telefono = array('name'=>'telefono',
	 		'placeholder'=>'Telefono'); 	 	
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
		<?=	form_input($direccion) ?>
		<br>
		<?=	form_input($telefono) ?>
		<br>
		<?=	form_submit('aceptar','Aceptar') ?>
	</p>
	<a href="<?= base_url().'index.php/usuarios/' ?>" title="Iniciar sesion">Iniciar sesion</a>
	<?= form_close() ?>
	</body>
</html>