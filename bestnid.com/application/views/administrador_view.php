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
                        <a href="<?= base_url(index_page().'/administrador/crear_categoria') ?>"> Crear una categoria </a>
                    </li>
                    <li>
                        <a href="<?= base_url(index_page().'/administrador/eliminar_categoria') ?>"> Eliminar una categoria </a>
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
                                case 'crear_categoria': 
                    ?>
                                    <?= form_open_multipart('administrador/insertarDatosCategoria', "onSubmit = 'return crear_categoria();'") ?>
                                        <?php
                                            $nombreCategoria = array(
                                                'name' => 'nombreCategoria',
                                                'class' => 'form-control',
                                                'placeholder' => 'Nombre de la categoría',
                                                'required' => 'required',
                                                'pattern' => '.{3,30}$',
                                                'title' => 'Por favor, ingrese un mínimo de 3 caractéres. Maximo 30.'
                                            );
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <p align="center">
                                                    <?= form_label('Ingrese el nombre de la categoría') ?>
                                                </p>
                                                <?= form_input($nombreCategoria) ?>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <p align="center">
                                                    <?= form_label('Seleccione una imagen') ?>
                                                </p>
                                                <input type="file" name="userfile" id="upload" size="20" />
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <center>
                                            <?= form_submit('', 'Crear Categoría', "class='btn btn-darkest'") ?>
                                            <a href="<?= base_url(index_page().'/administrador') ?>">
                                                <button type="button" class="btn btn-darkest"> Cancelar </button>
                                            </a>
                                        </center>
                                    <?= form_close() ?>
                    <?php
                                    break;
                                case 'eliminar_categoria': 
                    ?>
                                    <h2 align="center">
                                        Seleccione la categoría que desee eliminar 
                                    </h2>
                                    <br>
                                    <br>
                                    <div table-responsive>
                                        <table class="table table-condensed">
                                            <?php
                                                $i = 0;
                                                foreach($categorias->result() as $categoria) {
                                                    if($i == 0) { ?>
                                                        <tr>
                                                    <?php
                                                        $i = 3;
                                                    }
                                                    ?>
                                                    <td>
                                                        <p align="center"> 
                                                            <a href="<?= base_url(index_page().'/administrador/eliminarDatosCategoria?idCategoria='.$categoria->idCategoria) ?>" onClick="return(eliminar_categoria());">
                                                                <img src="<?= base_url('images/'.$categoria->nombreImagen) ?>" class="img-rounded" width="180" height="100">
                                                                <p align="center" > 
                                                                    <label>
                                                                        <?= $categoria->nombreCategoria ?>
                                                                    </label>
                                                                </p>
                                                            </a>
                                                        </p>
                                                    </td>
                                                <?php
                                                    $i--;
                                                    if($i == 0) { ?>
                                                        </tr>
                                                <?php
                                                    }
                                                ?>
                                            <?php
                                                }
                                                if($i > 0) { ?> <!-- Si i es mayor a 0 significa que salio del foreach sin cerrar la fila (el <tr>) -->
                                                    </tr>
                                            <?php
                                                }
                                            ?>
                                        </table>
                                    </div> 
                    <?php
                                    break;
                            }
                        }
                        else { // En caso de que no exista la variable opcion significa que se accede a la vista por primera vez y se cargan los datos por default
                    ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 align="center"> ¡Bienvenido a la sección administrador de Bestnid! </h2>
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

        function crear_categoria() {
            var archivo = document.getElementById('upload').value;
            if(archivo == null || archivo == "") {
                alert('No ha elegido ninguna imagen para la categoría');
                return false;
            }
            else {
                alert('¡Categoría creada con éxito!');
                return true;
            }
        }

        function eliminar_categoria() {
            if(confirm('¿Esta seguro que desea eliminar la categoría?') == true) {
                alert('¡Categoría eliminada exitosamente!');
                return (true);
            }
            else {
                return (false);
            }
        }
    </script>
</html>