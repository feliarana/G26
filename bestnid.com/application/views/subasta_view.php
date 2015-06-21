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
            <br>
            <img src="<?= base_url('images/'.$subasta[0]->nombreImagen) ?>" class="img-rounded" width="300" height="200">
        </h1>
        <br>
        <br>
        

        <div class="container">


  <!-- Trigger the modal with a button -->
  <p align="center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ofertar!</button></p>

  <!-- Modal PARA OFERTAR !!-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Ingrese necesidad...</p>
          <textarea> </textarea>
          <button type="button" class="btn btn-info btn-lg" >Enviar.</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<form role="form">
  <div class="form-group">
    <div class="col-md-2"></div>
    <input class="col-md-2" type="text" class="form-control" id="pregunta" placeholder="Escribe tu pregunta">
    <button type="submit" class="btn btn-default">Enviar</button>
  </div>
  <div hidden class="form-group">
    <label hidden for="pwd">Respuesta:</label>
    <input hidden type="text" class="form-control" id="respuesta">
  </div>
</form>

Preguntas realizadas



        <!-- Estos archivos deben cargarse si o si antes de definir la tabla, sino no los toma -->
        <!-- Se carga jquery -->
        <script src="<?= base_url('js/jquery.js') ?>" type="text/javascript" charset="utf8"></script>
        <!-- Se cargan las funciones javascript de Bootstrap -->
        <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    </body>
</html>