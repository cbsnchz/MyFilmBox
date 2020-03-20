<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<meta charset="utf-8">
	<title>Portada</title>
</head>

<body>

<div id="contenedor">
	<?php
		include('handlers/cabecera.php');		
		include('handlers/sbIzq.php');		
	?>
	
	<div id="contenido">
		
		<h1>Página principal</h1>
		<p> Aquí está el contenido público, visible para todos los usuarios. </p>
	</div>	

	<?php		
		include('handlers/sbDer.php');	
		include('handlers/pie.php');
	?>
</div>

	

	

	

</div> <!-- Fin del contenedor -->

</body>
</html>