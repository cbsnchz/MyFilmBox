<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/cabeceracss.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<div id="cabecera">
		<h1>MyFilmBox</h1>
		<body>
		
		<ul>
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="catalogo.php">Catálogo</a></li>
			<li><a href="tienda.php">Tienda</a></li>


			

			 
			 <?php
		
		if(!isset($_SESSION["login"])){
			$html = '<li id="boton" style="float:right"><a href="login.php"><i class="far fa-user icon-login"></i></a></li>';
		}
		else{
			$html = '<li id="boton" style="float:right"><a href="logout.php">' . $_SESSION["nombre"] . '</a></li>';
		}
		echo $html; 
		?>	


		<li style="float:right">
		<div  class="container-3">
				<form action="buscar.php" method="post">
				 <span class="icon"><i class="fa fa-search"></i></span>
				  <input type="search" id="search" placeholder="Search.." name="search">
				  
				</form>
			 </div>
		</li>
			
		</ul>
		</body>
</div>
</html>
