<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Portada</title>
</head>

<body>

<div id="contenedor">
	<?php
		include('cabecera.php');		
		include('sbIzq.php');		
	?>
	
	<div id="contenido">
		
		<h1>Página principal</h1>
		<p> Aquí está el contenido público, visible para todos los usuarios. </p>
	</div>	

	<?php		
		include('sbDer.php');	
		include('pie.php');
	?>
</div>

	

	

	

</div> <!-- Fin del contenedor -->

</body>
</html>