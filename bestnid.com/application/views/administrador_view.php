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
		<div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href""> Administrador </a>
                    </li>
                    <li>
                        <a href="<?= base_url(index_page().'/administrador/consultar_usuarios') ?>"> Consultar usuarios registrados </a>
                    </li>
                    <li>
                        <a href="<?= base_url(index_page().'/administrador/consultar_subastas') ?>"> Consultar subastas vendidas </a>
                    </li>
                    <li>
                        <a href="<?= base_url(index_page().'/administrador/crearCategoria') ?>"> Crear una categoria </a>
                    </li>
                    <li>
                        <a href="<?= base_url(index_page().'/administrador/eliminarCategoria') ?>"> Eliminar una categoria </a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <?php
                        if(isset($opcion)) { // Si existe la variable opcion
                            switch($opcion) { // Verifica que opcion se eligio y carga la vista correspondiente
                                case 'value': 
                    ?>
                                    Hola
                    <?php
                                    break;
                                case 'value': 
                    ?>
                                    Como
                    <?php
                                    break;
                                case 'value': 
                    ?>
                                    Andas
                    <?php
                                    break;
                                case 'value': 
                    ?>
                                    Nati
                    <?php
                                    break;
                            }
                        }
                        else { // En caso de que no exista la variable opcion significa que se accede a la vista por primera vez y se cargan los datos por default
                    ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 align="center"> ¡Bienvenido a la sección de administrador de Bestnid! </h2>
                                    <br>
                                    <br>
                                    <center>
                                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                                    </center>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>

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