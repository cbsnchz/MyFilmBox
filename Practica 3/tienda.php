+<!DOCTYPE html>
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

		<div id="myBtnContainer">
		  <button class="btn active" onclick="filterSelection('all')"> Todos</button>
		  <button class="btn" onclick="filterSelection('pelicula')"> Peliculas</button>
		  <button class="btn" onclick="filterSelection('accesorio')"> Accesorios</button>
		  <button class="btn" onclick="filterSelection('merchandicing')"> Merchandising</button>
  
		  
		</div>

		<!-- Portfolio Gallery Grid -->
		<div class="row">
			<?php
			$conne = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME_PRODUCTO);
			if ($conne->connect_error) {
			   die("Fallo de conexion con la base de datos: " . $conne->connect_error);
			}
			else{
				$conne->set_charset("utf8");
				$sql = "SELECT Id, nombre, imagen, categoria FROM producto";
				$result = $conne->query($sql)
					   or die ($conne->error. " en la línea ".(LINE-1));

				if($result->num_rows > 0){
					while($fila = $result->fetch_assoc()){
						echo '<div class="column '.$fila["categoria"].'">';
							echo '<div class="content">';
								echo '<img src="'.$fila["imagen"].'"style="width:20%">';
								echo "<h4> <a href=\"producto.php?id=".$fila["Id"]."\">".$fila["nombre"]."</a> </h4>";
							echo '</div>';
						echo '</div>';
					}
				}
			}
			$conne -> close();
			?>
		<!-- END GRID -->
		</div>
		</div>					
		<?php	
			include('includes/common/pie.php');
		?>
	</div>

		

		

		

	</div> <!-- Fin del contenedor -->

</body>
<script type="text/javascript" src="js/tienda.js"></script>
</html>