<!DOCTYPE html>
<html>
<?php include_once('includes/config.php'); ?>
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<meta charset="utf-8">
	<title>Portada</title>
</head>

<body>

<div id="contenedor">
	<?php
		include('includes/common/cabecera.php');		
		include('includes/common/sbIzq.php');		
	?>
	
	<div id="contenido">
		
		<h1>Página principal</h1>
		<p> Aquí está el contenido público, visible para todos los usuarios. </p>

	</div>	

	<?php		
		include('includes/common/sbDer.php');	
		include('includes/common/pie.php');
	?>
</div>

	

	

	

</div> <!-- Fin del contenedor -->

</body>
</html>