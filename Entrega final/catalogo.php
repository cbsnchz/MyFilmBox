
<!DOCTYPE html>
<html>
<?php include_once('includes/config.php'); ?>
<head>
		<link rel="stylesheet" type="text/css" href="css/catalogo.css" />
</head>
<body>

	<div id="contenedor">
		<?php
			include('includes/common/cabecera.php');			
		?>
		
		<div id="contenido" class="main">
			<?php 
				es\ucm\fdi\aw\Pelicula::imprimeListaPeliculas();
			?>
		
		</div>	
		
		<?php	
			include('includes/common/pie.php');
		?>
	</div>

		


</body>
<script type="text/javascript" src="js/catalogo.js"></script>
</html>
