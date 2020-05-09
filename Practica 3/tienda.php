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
				es\ucm\fdi\aw\Producto::imprimeListaProductos();
			
			?>
		</div>
						
		<?php	
			include('includes/common/pie.php');
		?>
		</div>

		

	</div> <!-- Fin del contenedor -->

</body>
<script type="text/javascript" src="js/tienda.js"></script>
</html>
