<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- Se cargan los estilos de bootstrap -->
    	<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
    	<!-- Se cargan los estilos para la sidebar -->
    	<link href="<?= base_url('css/simple-sidebar.css') ?>" rel="stylesheet" media="screen">
	</head>
	<body>
		<!--<ul class="nav nav-pills nav-justified" style='background-color: #f5f5f5;'>
  			<li role="presentation"><a href="#">Consultar usuarios registrados</a></li>
  			<li role="presentation"><a href="#">Consultar subastas vendidas</a></li>
  			<li role="presentation"><a href="#">Crear una nueva categoria</a></li>
  			<li role="presentation"><a href="#">Eliminar una categoria</a></li>
		</ul>
		<p align="center">
			<a href="<?= base_url(index_page().'/index') ?>">
				<img src="<?= base_url('images/logo.png') ?>" alt="descripción_de_la_imagen">
			</a>
		</p>-->
		<!--<div class="row" height="100%">
			<div class="col-md-3">
				<ul class="nav nav-pills nav-stacked" style='background-color: #f5f5f5;'>
  					<li role="presentation"><a href="#">Home</a></li>
  					<li role="presentation"><a href="#">Profile</a></li>
  					<li role="presentation"><a href="#">Messages</a></li>
				</ul>
			</div>
		</div>-->
		<div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href"">
                            Administrador
                        </a>
                    </li>
                    <li>
                        <a href="#">Consultar usuarios registrados</a>
                    </li>
                    <li>
                        <a href="#">Consultar subastas vendidas</a>
                    </li>
                    <li>
                        <a href="#">Crear una categoria</a>
                    </li>
                    <li>
                        <a href="#">Eliminar una categoria</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Simple Sidebar</h1>
                            <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!--<h2 align="right"> ¡Bienvenido a la sección de administrador de Bestnid! </h2>-->

		<!-- JQuery cargado de forma local (sin conexion a internet) -->
    	<script src="<?= base_url('js/jquery.js') ?>"></script>
		<!-- Se cargan las funciones javascript de Bootstrap -->
    	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
	</body>
	<script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</html>