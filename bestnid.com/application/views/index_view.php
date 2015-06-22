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
		<!-- En total la tabla debe sumar 12 columnas -->
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-1">
  				<a href="<?= base_url(index_page().'/categorias') ?>">Categorías</a> <!-- Se ubica en columna 4 -->
  			</div>
  			<div class="col-md-1">
				<a href="<?= base_url('images/enConstruccion.jpg') ?>">Ayuda</a> <!-- Se ubica en columna 5 -->
			</div>
			<div class="col-md-2">
				<!-- Se ubica en columna 6 -->
				<p align="center">
					<img src="<?= base_url('images/logo.png') ?>">
				</p>
			</div>
			<?php
				if(isset($this->session->userdata['login'])) { ?>
					<div class="col-md-2"> <!-- Se ubica en columna 9 -->
						<a href="<?= base_url('/index.php/logout') ?>">Cerrar Sesión</a>
					</div>
					<div class="col-md-3">
						<p align="center">
							<span class="glyphicon glyphicon-user">
								<?= $this->session->userdata['nombre'].' '.$this->session->userdata['apellido'] ?> 
							</span>
						</p>
					</div>
			<?php
				}
				else { ?>
					<div class="col-md-1"> <!-- Se ubica en columna 8 -->
						<a href="<?= base_url('/index.php/register') ?>">Registrarse</a>
					</div>
					<div class="col-md-2"> <!-- Se ubica en columna 9 -->
						<a href="<?= base_url('/index.php/login') ?>">Iniciar Sesión</a>
					</div>
					<div class="col-md-2">
					</div>
			<?php
				}
			?>
		</div>
		<h1 align="center"> Bestnid </h1>
		<h2 align="center"> Elegí con el corazón </h2>
		<br>
		<?php
			if(isset($this->session->userdata['login'])) { ?>
				<center>
					<button type="button" class="btn btn-darkest">Publicar una subasta</button>
				</center>
		<?php
			}
		?>
		<!-- Estos archivos deben cargarse si o si antes de definir la tabla, sino no los toma -->
		<!-- Se carga jquery -->
    	<script src="<?= base_url('js/jquery.js') ?>" type="text/javascript" charset="utf8"></script>
		<!-- Se carga la libreria dataTables -->
    	<script src="<?= base_url('js/jquery.dataTables.min.js') ?>" type="text/javascript" charset="utf8"></script>
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="tablaSubastas">
			<thead>
				<tr>
					<th>Imagen</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Fecha de Finalización</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($subastas) {
						foreach($subastas->result() as $subasta) { ?>
							<tr class="gradeX">
								<td>
									<center>
										<a href="<?= base_url(index_page().'/subasta?id='.$subasta->idSubasta) ?>">
											<img src="<?= base_url('images/'.$subasta->nombreImagen) ?>" width="50px" height="50px">
										</a>
									</center>
								</td>
								<td>
									<center>
										<a href="<?= base_url(index_page().'/subasta?id='.$subasta->idSubasta) ?>">
											<?= $subasta->nombreSubasta ?>
										</a>
									</center>
								</td>
								<td> 
									<center> <?= $subasta->descripcion ?> </center>
								</td>
								<td>
									<center> <?= $subasta->fechaFin ?> </center>
								</td>
							</tr>
				<?php
						}
					}
				?>
			</tbody>
		</table>
		<!-- Configuracion de la dataTable -->
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#tablaSubastas').dataTable( {
					"aaSorting":[],
					"aoColumnDefs":[ { 'bSortable': false, 'aTargets': [0, 2] } ],
        			"language": {
        				"search": "Buscar",
            			"lengthMenu": "Mostrar _MENU_ subastas por página",
            			"zeroRecords": "No se han encontrado subastas",
            			"info": "Mostrando página _PAGE_ de _PAGES_",
            			"infoEmpty": "No hay registros disponibles",
            			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
            			"loadingRecords": "Cargando",
            			"processing":     "Procesando",
            			"zeroRecords":    "No hay subastas coincidentes encontradas",
            			"paginate": {
        					"first":      "Primero",
        					"last":       "Ultimo",
        					"next":       "Siguiente",
        					"previous":   "Anterior"
    					},
    					"aria": {
        					"sortAscending":  ": activar para ordenar columna de forma ascendente",
        					"sortDescending": ": activar para ordenar columna de forma descendente"
    					}
        			}
    			} );
			} );
		</script>
		<!-- Se cargan las funciones javascript de Bootstrap -->
    	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    	<!-- Este archivo le da estilo introduciendole bootstrap a la libreria dataTables mediante javascript -->
    	<script src="<?= base_url('js/dataTables.bootstrap.min.js') ?>" type="text/javascript" charset="utf8"></script>
	</body>
</html>