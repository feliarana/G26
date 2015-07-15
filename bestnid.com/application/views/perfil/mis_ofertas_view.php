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


        <!-- Estos archivos deben cargarse si o si antes de definir la tabla, sino no los toma -->
        <!-- Se carga jquery -->
        <script src="<?= base_url('js/jquery.js') ?>" type="text/javascript" charset="utf8"></script>
        <!-- Se carga la libreria dataTables -->
        <script src="<?= base_url('js/jquery.dataTables.min.js') ?>" type="text/javascript" charset="utf8"></script>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="tablaSubastas">
            <thead>
                <tr>
                    <th>Subasta</th>
                    <th>Argumento de oferta</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($ofertas) {
                        foreach($ofertas->result() as $oferta) { 
                            if ($oferta->ganador == NULL){ ?>  <!-- SI LA SUBASTA NO TIENE GANADOR-->
                                <tr class="gradeX">
                                    <td>
                                        <center>
                                            <a href="<?= base_url(index_page().'/subasta?idSubasta='.$oferta->idSubasta) ?>">
                                                <?= $oferta->nombreSubasta ?>
                                            </a>
                                        </center>
                                    </td>
                                    <td> 
                                        <center> <?= $oferta->argumento ?> </center>
                                    </td>
                                    <td>
                                        <center> <?= $oferta->monto ?> </center>
                                    </td>

                            </tr>
                <?php
                            }//DEL IF SUBASTA-> GANADOR
                        }//DEL FOR
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