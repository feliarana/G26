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

	</head>
<div class="bs-example">

			<h2>Información del usuario</h2>
		    <dl class="dl-horizontal">
		        <dt>DNI</dt>
		        <dd> <?php echo $query->result()[0]->DNI ?></dd>
		        <dt>Nombre</dt>
		        <dd> <?php echo $query->result()[0]->nombre; ?>  </dd>
		        <dt>Apellido</dt>
		        <dd> <?php echo $query->result()[0]->apellido; ?>  </dd>
		        <dt>Email</dt>
		        <dd> <?php echo $query->result()[0]->email; ?>  </dd>
		        <dt>Direccion</dt>
		        <dd> <?php echo $query->result()[0]->direccion; ?>  </dd>
		        <dt>Teléfono</dt>
		        <dd> <?php echo $query->result()[0]->telefono; ?>  </dd>
</html>