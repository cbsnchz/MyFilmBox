<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<div id="menu">
		
		<body>
		
		<ul>
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="catalogo.php">Catálogo</a></li>
			<li><a href="tienda.php">Tienda</a></li>
			<?php
		
			if(isset($_SESSION["login"])){
				$html = '<li class="boton" style="float:right"><a href="login.php"><i class="far fa-user icon-login"></i></a></li>';
				echo $html; 
			}
			?>	

		</ul>
		</body>
</div>
</html>
