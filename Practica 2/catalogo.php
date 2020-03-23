
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="css/catalogo.css" />
</head>
<body>

	<div id="contenedor">
	<?php
		include('includes/common/cabecera.php');		
		include('includes/common/sbIzq.php');		
	?>
	
	<div id="contenido" class="main">

		<div id="myBtnContainer">
		  <button class="btn active" onclick="filterSelection('all')"> Todos</button>
		  <button class="btn" onclick="filterSelection('Paisajes')"> Paisajes</button>
		  <button class="btn" onclick="filterSelection('Barcos')"> Barcos</button>
		  <button class="btn" onclick="filterSelection('Animales')"> Animales</button>
		</div>

		<!-- Portfolio Gallery Grid -->
		<div class="row">
		  <div class="column Paisajes">
			<div class="content">
			  <img src="img/paisajes1.jpg" alt="Montaña" style="width:100%">
			  <h4>Montañas</h4>
			</div>
		  </div>
		  <div class="column Paisajes">
			<div class="content">
			  <img src="img/paisajes3.jpg" alt="Lago" style="width:100%">
			  <h4>Lagos</h4>
			</div>
		  </div>
		  <div class="column Paisajes">
			<div class="content">
			  <img src="img/paisajes4.jpg" alt="Cascada" style="width:100%">
			  <h4>Cascada</h4>
			</div>
		  </div>

		  <div class="column Barcos">
			<div class="content">
			  <img src="img/barcos1.jpg" alt="Velero" style="width:100%">
			  <h4>Velero</h4>
			</div>
		  </div>
		  <div class="column Barcos">
			<div class="content">
			  <img src="img/barcos2.jpg" alt="Lancha" style="width:100%">
			  <h4>Lancha</h4>
			</div>
		  </div>
		  <div class="column Barcos">
			<div class="content">
			  <img src="img/barcos3.jpg" alt="Crucero" style="width:100%">
			  <h4>Crucero</h4>
			</div>
		  </div>

		  <div class="column Animales">
			<div class="content">
			  <img src="img/animales1.jpg" alt="Salvajes" style="width:100%">
			  <h4>Salvajes</h4>
			</div>
		  </div>
		  <div class="column Animales">
			<div class="content">
			  <img src="img/animales2.jpg" alt="Vacas" style="width:100%">
			  <h4>Vacas</h4>
			</div>
		  </div>
		  <div class="column Animales">
			<div class="content">
			  <img src="img/animales3.jpg" alt="Elefantes" style="width:100%">
			  <h4>Elefantes</h4>
			</div>
		  </div>
		<!-- END GRID -->
		</div>
		</div>					
			include('includes/common/sbDer.php');	
			include('includes/common/pie.php');
		?>
	</div>

		

		

		

	</div> <!-- Fin del contenedor -->

</body>
<script type="text/javascript" src="catalogo.js"></script>
</html>
