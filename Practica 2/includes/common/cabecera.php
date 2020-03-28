<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/cabeceracss.css" />
<div id="cabecera">
		<h1>MyFilmBox</h1>
		<body>
		<ul>
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="catalogo.php">Catálogo</a></li>
			<li><a href="tienda.php">Tienda</a></li>
			<div class="search-container">
				<form action="/buscar.php">
				  <input type="text" placeholder="Search.." name="search">
				  <button type="submit">Submit</button>
				</form>
			 </div>
			
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
			
		</ul>
		</body>
</div>
</html>
