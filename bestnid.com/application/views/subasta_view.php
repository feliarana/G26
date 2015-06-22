<!DOCTYPE html>
<html lang="en">
	<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Se cargan los estilos de bootstrap -->
      <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
	</head>
    <body>
        <p align="center">
            <a href="<?= base_url(index_page().'/index') ?>">
                <img src="<?= base_url('images/logo.png') ?>">
            </a>
        </p>
        <h1 align="center"> 
            <?= $subasta[0]->nombreSubasta ?>
        </h1>
        <center>
            <img src="<?= base_url('images/'.$subasta[0]->nombreImagen) ?>" class="img-rounded" width="300" height="200" />
        </center>
        <br>
        <br>
        <div class="container">
            <!-- Trigger the modal with a button -->
            <p align="center">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Ofertar </button>
            </p>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> Ofertar </h4>
                        </div>
                        <div class="modal-body">
                            <?php $atributos = array('class' => 'form-horizontal', 'role' => 'form'); ?>
                            <?= form_open("/subasta/oferta?idSubasta=".$subasta[0]->idSubasta, $atributos) ?>
                            <?php
                                $argumento = array(
                                    'name' => 'argumento',
                                    'class' => 'form-control',
                                    'rows' => '2',
                                    'maxlength' => '140',
                                    'placeholder' => 'Ingrese necesidad...'
                                );
                                $monto = array(
                                    'name' => 'monto',
                                    'class' => 'form-control',
                                    'type' => 'number',
                                    'min' => '1',
                                    'max' => '1000000000000',
                                    'placeholder' => 'Ingrese un monto',
                                )
                            ?>
                            <?= form_textarea($argumento) ?>
                            <br>
                            <?= form_input($monto) ?>
                            <br>
                            <?= form_submit('', 'Enviar', "class='btn btn-primary'") ?>
                            <?= form_close() ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar </button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Se carga jquery -->
        <script src="<?= base_url('js/jquery.js') ?>" type="text/javascript" charset="utf8"></script>
        <!-- Se cargan las funciones javascript de Bootstrap -->
        <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    </body>
</html>