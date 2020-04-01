
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
		include('includes/common/sbIzq.php');		
	?>
	
	<div id="contenido" class="main">

		<div id="myBtnContainer">
		  <button class="btn active" onclick="filterSelection('all')"> Todos</button>
		  <button class="btn" onclick="filterSelection('Accion')"> Accion</button>
		  <button class="btn" onclick="filterSelection('Adultas')"> Adultas</button>
		  <button class="btn" onclick="filterSelection('Aventuras')"> Aveturas</button>
		  <button class="btn" onclick="filterSelection('Belica')"> Bélica</button>
		  <button class="btn" onclick="filterSelection('Ciencia Ficcion')"> Ciencia Ficcion</button>
		  <button class="btn" onclick="filterSelection('Comedia')"> Comedia</button>
		  <button class="btn" onclick="filterSelection('Drama')"> Drama</button>
		  <button class="btn" onclick="filterSelection('Infantiles')"> Infantiles</button>
		  <button class="btn" onclick="filterSelection('Musical')"> Musical</button>
		  <button class="btn" onclick="filterSelection('Musical')"> Oeste</button>
		  <button class="btn" onclick="filterSelection('Romance')"> Romance</button>
		  <button class="btn" onclick="filterSelection('Terror')"> Terror</button>
		  <button class="btn" onclick="filterSelection('Thiller')"> Thiller</button>
		  
		  
		</div>

		<!-- Portfolio Gallery Grid -->
		<div class="row">
			<?php
			$conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME_PELI);
			if ($conn->connect_error) {
			   die("Fallo de conexion con la base de datos: " . $conn->connect_error);
			}
			else{
				$conn->set_charset("utf8");
				$sql = "SELECT id, nombre, imagen, genero FROM pelicula";
				$result = $conn->query($sql)
					   or die ($conn->error. " en la línea ".(LINE-1));

				if($result->num_rows > 0){
					while($fila = $result->fetch_assoc()){
						echo '<div class="column '.$fila["genero"].'">';
							echo '<div class="content">';
								echo '<img src="'.$fila["imagen"].'"style="width:20%">';
								echo "<h4> <a href=\"pelicula.php?id=".$fila["id"]."\">".$fila["nombre"]."</a> </h4>";
							echo '</div>';
						echo '</div>';
					}
				}
			}
			$conn -> close();
			?>
		<!-- END GRID -->
		</div>
		</div>					
		<?php	
			include('includes/common/sbDer.php');	
			include('includes/common/pie.php');
		?>
	</div>

		

		

		

	</div> <!-- Fin del contenedor -->

</body>
<script type="text/javascript" src="js/catalogo.js"></script>
</html>
