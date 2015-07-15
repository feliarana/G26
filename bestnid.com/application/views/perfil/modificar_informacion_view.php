<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
		<title> Modificar informacion personal </title>
	</head>
	<body>
	 
		<?php
			if(isset($datos_error)) { ?>
				<h4>
					<p align="center">
						<font color="red"> <?= $datos_error ?> </font>
					</p>
				</h4>
		<?php
			}
		?>
		<br>

		<?= form_open('perfil/verificar_datos') ?>
		<?php
			$nombre = array('name' => 'nombre',
				'value' =>  $query->result()[0]->nombre,
				'class' => 'form-control',
	 			'placeholder' => 'Nombre',
	 			'required' => 'required',
	 			'pattern' => '[A-Za-z]{2,20}',
	 			'title' => 'Por favor, ingrese un mínimo de 2 LETRAS. Maximo 20.'
	 		);

 	 		$apellido = array('name' => 'apellido',
 	 			'value' =>$query->result()[0]->apellido,
 	 			'class' => 'form-control',
	 			'placeholder' => 'Apellido',
	 			'required' => 'required',
	 			'pattern' => '[A-Za-z]{2,20}',
	 			'title' => 'Por favor, ingrese un mínimo de 2 LETRAS. Maximo 20.'
	 		);
	 	

	 		$password = array('name' => 'password',
	 			'type' => 'password',
	 			'class' => 'form-control',
	 			'placeholder' => 'Contraseña',
	 			'required' => 'required',
	 			'pattern' => '.{6,15}',
	 			'title' => 'Por favor, ingrese un mínimo de 6 caracteres. Maximo 15.'
	 		);

	 		$password2 = array('name' => 'password2',
	 			'type' => 'password',
	 			'class' => 'form-control',
	 			'placeholder' => 'Repetir Contraseña',
	 			'required' => 'required',
	 			'pattern' => '.{6,15}',
	 			'title' => 'Por favor, ingrese un mínimo de 6 caracteres. Maximo 15.'
	 		);

     		$direccion = array('name' => 'direccion',
     			'value' => $query->result()[0]->direccion,
     			'class' => 'form-control',
	 			'placeholder' => 'Direccion',
	 			'required' => 'required',
	 			'pattern' => '.{1,30}',
	 			'title' => 'Por favor, ingrese un mínimo de 1 caracteres. Maximo 30.'
	 		);
 	 
 	 		$telefono = array('name' => 'telefono',
 	 			'value' => $query->result()[0]->telefono,
 	 			'class' => 'form-control',
	 			'placeholder' => 'Telefono',
	 			'pattern' => '[0-9]{8,15}',
	 			'title' => 'Por favor, ingrese un mínimo de 8 NUMEROS'
	 		);
		?>
		<p>
			<div class="row">
				<div class="col-md-5">
				</div>
				<div class="col-md-2">
					<div class="form-group">	
						<?=	form_password($password) ?>
					</div>
					<div class="form-group">	
						<?=	form_input($password2) ?>
					</div>
					<div class="form-group">	
						<?=	form_input($nombre) ?>
					</div>
					<div class="form-group">	
						<?=	form_input($apellido) ?>
					</div>
					<div class="form-group">	
						<?=	form_input($direccion) ?>
					</div>
					<div class="form-group">	
						<?=	form_input($telefono) ?>
					</div>
					<p align="center">
						<br>
						<?=	form_submit('submit_reg', 'Modificar', "class='btn btn-darkest'") ?>
					</p>
				</div>
				<div class="col-md-5">
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