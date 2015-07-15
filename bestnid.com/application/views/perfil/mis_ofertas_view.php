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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($ofertas) {
                        foreach($ofertas->result() as $oferta) { 
                            if ($oferta->ganador == NULL || $oferta->pagada ==0){ ?>  <!-- SI LA SUBASTA NO TIENE GANADOR O SI FUI SELECCIONADO GANADOR Y LA SUBASTA NO FUE PAGADA -->
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
                                    <td>
                                        <?php if (($oferta->ganador != NULL) && ($oferta->pagada == 0)){ ?>
                                            <center> 
                                              <button type="button" class="btn btn-darkest" data-toggle="modal" data-target="#myModal"> Pagar subasta </button> 
                                            </center>
                                        <?php } ?>
                                            <div class="container">
                                              <!-- Modal -->
                                              <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title">Pagar subasta</h4>
                                                    </div>
                                                    <div class="modal-body"> 
                                                        <?= form_open('perfil/verificar_tarjeta') ?> <!--ACA EMPIEZA EL FORM dentor del modal para que verifique los datos  -->
                                                            <?php
                                                                $DNI = array('name' => 'DNI',
                                                                    'value' => @set_value('DNI'),
                                                                    'class' => 'form-control',
                                                                    'placeholder' => 'Documento del titular',
                                                                    'required' => 'required',
                                                                    'pattern' => '[0-9]{8}',
                                                                    'title' => 'Por favor, ingrese un DNI válido.'
                                                                );

                                                                $nombre = array('name' => 'nombre',
                                                                    'value' => @set_value('nombre'),
                                                                    'class' => 'form-control',
                                                                    'placeholder' => 'Nombre del titular',
                                                                    'required' => 'required',
                                                                    'pattern' => '[A-Za-z]{2,20}',
                                                                    'title' => 'Por favor, ingrese un mínimo de 2 LETRAS. Maximo 20.'
                                                                );

                                                                $apellido = array('name' => 'apellido',
                                                                    'value' => @set_value('apellido'),
                                                                    'class' => 'form-control',
                                                                    'placeholder' => 'Apellido del titular',
                                                                    'required' => 'required',
                                                                    'pattern' => '[A-Za-z]{2,20}',
                                                                    'title' => 'Por favor, ingrese un mínimo de 2 LETRAS. Maximo 20.'
                                                                );

                                                                $codigoSeguridad = array('name' => 'codigoSeguridad',
                                                                    'value' => @set_value('codigoSeguridad'),
                                                                    'class' => 'form-control',
                                                                    'placeholder' => 'Numero de tarjeta',
                                                                    'required' => 'required',
                                                                    'pattern' => '[0-9]{16}',
                                                                    'title' => 'Por favor, ingrese un numero de tarjeta valido.'
                                                                );

                                                                $numeroTarjeta = array('name' => 'numeroTarjeta',
                                                                    'value' => @set_value('numeroTarjeta'),
                                                                    'class' => 'form-control',
                                                                    'placeholder' => 'Codigo seguridad',
                                                                    'required' => 'required',
                                                                    'pattern' => '[0-9]{3}',
                                                                    'title' => 'Por favor, ingrese un codigo de seguridad válido.'
                                                                );

                                                                $monto =  array('name' => 'monto', 
                                                                    'value' =>$oferta->monto,
                                                                    'class' => 'form-control',
                                                                    'placeholder' => 'Ingrese un monto',
                                                                    );
                                                            ?>
                                                            <p>
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                    </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">    
                                                                                <?= form_input($DNI) ?>
                                                                            </div>
                                                                            <div class="form-group">    
                                                                                <?= form_input($nombre) ?>
                                                                            </div>
                                                                            <div class="form-group">    
                                                                                <?= form_input($apellido) ?>
                                                                            </div>
                                                                            <div class="form-group">    
                                                                                <?= form_input($numeroTarjeta) ?>
                                                                            </div>
                                                                            <div class="form-group">    
                                                                                <?= form_input($codigoSeguridad) ?>
                                                                            </div>
                                                                            <div class="form-group">    
                                                                                <?= form_input($monto) ?>
                                                                            </div>
                                                                            <p align="center">
                                                                                <br>
                                                                                <?= form_submit('submit_reg', 'Confirmar datos', "class='btn btn-darkest'") ?>
                                                                            </p>

                                                                        </div>
                                                                    <div class="col-md-5">
                                                                    </div>
                                                                </div>
                                                            </p>
                                                            <?= form_close() ?>

                                                    </div> <!--Del modal-body-->
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                              
                                            </div>
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
                    "aoColumnDefs":[ { 'bSortable': false, 'aTargets': [0, 3] } ],
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