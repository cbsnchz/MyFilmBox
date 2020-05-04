<!DOCTYPE html>
<html>
<head>
		<?php include_once('includes/config.php'); ?>
		<link rel="stylesheet" type="text/css" href="css/catalogo.css" />
</head>
<body>
	<div id="contenedor">
		<?php
			include('includes/common/cabecera.php');
		?>
		
		<div id="contenido" class="main">			
			<?php
			$conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME_PELI);
			if ($conn->connect_error) {
			   die("Fallo de conexion con la base de datos: " . $conn->connect_error);
			}
			else{
				$conn->set_charset("utf8");
				$busqueda = $_POST['search'];
				$sql = "SELECT id, nombre, imagen, genero FROM pelicula WHERE nombre LIKE '%$busqueda%'";
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
				else{
					echo '<h2>No se han encontrado resultados para la búsqueda: '.$busqueda.'.</h2>';
					while($result->num_rows === 0){
						$busqueda = substr($busqueda, 0, -1);
						
						$sql = "SELECT id, nombre, imagen, genero FROM pelicula WHERE nombre LIKE '%$busqueda%'";
						$result = $conn->query($sql)
							   or die ($conn->error. " en la línea ".(LINE-1));
					}
					echo '<h2>Resultados relacionados: </h2>';
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
		</div>
		
		<?php
			include('includes/common/pie.php');
		?>
	</div> 

</body>
<script type="text/javascript" src="js/catalogo.js"></script>
</html>