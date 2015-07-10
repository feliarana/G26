<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
    	<title>Modificar Subasta</title>
	</head>
	<body>
		<p align="center">
			<a href="<?= base_url(index_page().'/index') ?>">
				<img src="<?= base_url('images/logo.png') ?>">
			</a>
		</p>
		<!-- form_open_multipart es para la carga de archivos -->
		<?= form_open_multipart('subasta/actualizarDatosSubasta?idSubasta='.$subasta[0]->idSubasta, "onSubmit='return(validar());'"); ?>
		<?php

			$nombreSubasta = array(
				'name' => 'nombreSubasta',
				'class' => 'form-control',
	 			'placeholder' => 'Inserte el nombre del producto',
	 			'required' => 'required',
	 			'pattern' => '.{3,30}$',
	 			'title' => 'Por favor, ingrese un mínimo de 3 caractéres. Maximo 30.'
				);

			$descripcion = array(
				'name' => 'descripcion',
				'class' => 'form-control',
	 			'placeholder' => 'Inserte descripcion',
	 			'required' => 'required',
	 			'pattern' => '.{5,250}$',
	 			'title' => 'Por favor, ingrese un mínimo de 5 caractéres. Maximo 250.'
				);
		?>
		
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<p align="center">
						<?= form_label('Nombre del producto', 'nombreSubasta') ?>
					</p>
					<?= form_input($nombreSubasta) ?>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<p align="center">
						<?= form_label('Descripción', 'descripcion') ?>
					</p>
					<?= form_input($descripcion) ?>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<p align="center">
						<?= form_label('Seleccione una imagen') ?>
					</p>
					<input type="file" name="userfile" id="upload" size="20" />
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>

		<!-- Contenido del dropdown de categorias -->
		<?php 
			$categoria = array(
                1 => 'Vehículos',
                2 => 'Electrodomésticos',
                3 => 'Computación',
                4 => 'Teléfonos',
                5 => 'Ropa, Moda y Belleza',
                6 => 'Deportes',
                7 => 'Libros',
                8 => 'Entretenimiento',
                9 => 'Inmuebles',
                10 => 'Animales',
                11 => 'Servicios',
                12 => 'Hogar'
            ); 
    	?>

        <br>
        <div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<p align="center">
						<?= form_label('Categoría') ?>
					</p>
					<p align="center">
						<?= form_dropdown('categoria', $categoria); ?>
					</p>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<p align="center">
						<!-- Boton submit -->
						<br>
						<?= form_submit('', 'Editar subasta', "class='btn btn-darkest'") ?>
					</p>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>

		<?= form_close() ?>
	
	</body>
	<script type="text/javascript">
		function validar() {
			var archivo= document.getElementById('upload').value;
			if(archivo == null || archivo == "") {
				alert('No ha elegido ningun archivo para la subasta');
				return false;
			}
			else {
				alert('Su subasta ha sido modificada con éxito');
				return true;
			}
		}
	</script>
</html>