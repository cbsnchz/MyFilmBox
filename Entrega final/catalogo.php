
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

			if (isset($_REQUEST["page"]))
				$page = $_REQUEST["page"];
			else
				$page=0;

			if (isset($_REQUEST["numregs"]))
				$numregs = $_REQUEST["numregs"];
			else
				$numregs=12;

			if (isset($_REQUEST["sort"]))
				$sort = $_REQUEST["sort"];
			else
				$sort="nombre";

			es\ucm\fdi\aw\Pelicula::imprimeListaPeliculas($page, $numregs,$sort);
			?>
		
		</div>	
		
		<?php	
			include('includes/common/pie.php');
		?>
	</div>

		


</body>
<script type="text/javascript" src="js/catalogo.js"></script>
</html>
