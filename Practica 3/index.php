<!DOCTYPE html>
<html>
<?php include_once('includes/config.php'); ?>
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta charset="utf-8">
	<title>Portada</title>
</head>
<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>

<body>

<div id="contenedor">
	<?php
		include('includes/common/cabecera.php');				
	?>
	
	<div id="contenido">
	
		<div class="w3-content w3-display-container" style="max-width:800px">
		<img class="mySlides w3-animate-right" src="img/BienvenidoCompleto.jpg" style="width:100%">
		<img class="mySlides w3-animate-right" src="img/EstrenoCompleto.jpg" style="width:100%">
		<a href= "tienda.php"><img class="mySlides w3-animate-right" src="../img/bannerTienda.jpg" style="width:100%"></a>
		<div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
			<div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
			<div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
			<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
			<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
			<span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
	</div>
	</div>

	<script src = "js/slider.js"></script>
	
	
		<?php
		$conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME_PELI);
		if ($conn->connect_error) {
           die("Fallo de conexion con la base de datos: " . $conn->connect_error);
        }
		else{
			echo "<h3> Nuestras últimas películas añadidas: </h3>";
            $conn->set_charset("utf8");
			$sql = "SELECT id, nombre, genero, imagen FROM pelicula WHERE id >= (SELECT MAX(id) FROM pelicula) - 2";
			$result = $conn->query($sql)
				   or die ($conn->error. " en la línea ".(LINE-1));

			if($result->num_rows > 0){
				while($fila = $result->fetch_assoc()){						
					echo '<div>';
						echo '<img src="'.$fila["imagen"].'"style="width:15%">';
						echo "<h5> <a href=\"pelicula.php?id=".$fila["id"]."\">".$fila["nombre"]."</a> </h5>";
					echo '</div>';
						
				}
			}
			echo "<h3> Las últimas opiniones de nuestros usuarios: </h3>";
            $conn->set_charset("utf8");
			$sql = "SELECT id_post, usuario, titulo, Fecha, texto, id_pelicula FROM comentarios WHERE id_post >= (SELECT MAX(id_post) FROM comentarios) - 2";
			$result = $conn->query($sql)
				   or die ($conn->error. " en la línea ".(LINE-1));

			if($result->num_rows > 0){
				while($fila = $result->fetch_assoc()){		
					$sql0 = "SELECT id, nombre, imagen FROM pelicula WHERE id = ".$fila["id_pelicula"];
					$resultado = $conn->query($sql0)
								or die ($conn->error. " en la línea ".(LINE-1));
					echo '<div>';
						echo $fila["usuario"].' - '.$resultado->fetch_assoc()["nombre"];
						echo '<br>';
						echo $fila["texto"];
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
</div> <!-- Fin del contenedor -->
</body>
</html>
