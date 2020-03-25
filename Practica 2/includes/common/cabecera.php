<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/cabeceracss.css" />
<div id="cabecera">
		<h1>MyFilmBox</h1>
		<body>
		<ul>
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="catalogo.php">Catálogo</a></li>
			<li><a href="buscar.php">Buscar</a></li>
			<li><a href="tienda.php">Tienda</a></li>
			
			<?php
		
			if(!isset($_SESSION["login"])){
				echo "<li id=\"boton\" style=\"float: right\"><a href=\"login.php\">Login</a></li>";
			}
			else{
				//echo "<li id=\"boton\" style=\"float: right\"><a href=\"cuenta.php\">". $_SESSION["nombre"] ."</li>";
				$html = '<li id="boton" style="float:right"><a href="logout.php">' . $_SESSION["nombre"] . '</a></li>';
				echo $html; 
			}
			?>		
			
			</a></li>
		</ul>
		</body>
</div>
</html>
