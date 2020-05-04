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
				$html = '
				<li style="float:right">
					<div class="dropdown">
					<button class="dropbtn">Perfil</button>
					<div class="dropdown-content">
						<a href="#">Logout</a>
					</div>
					</div>
				</li>
				';
				echo $html; 
			}
			?>	

			
		</ul>
	</div>

</body>
</html>
