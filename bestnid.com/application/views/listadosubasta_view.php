<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Listado de subastas</title>
	</head>

	<body>
		<?php
			foreach($subastas->result() as $subasta) { ?>
				<ul>
					<li> <?= $subasta->nombre ?> </li>
				</ul>
		<?php 
			} 
		?>
	</body>

</html>
