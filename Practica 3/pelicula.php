<!DOCTYPE html>
<html>
<?php include_once('includes/config.php'); ?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/peliculacss.css" />
	<meta charset="utf-8">
	<title>Peliculas</title>
</head>

<body>
 <?php
	include('includes/common/cabecera.php');
 ?>

<form class="formulario">	
	<div class ="contenedor">
		<?php
			$id = $_GET["id"];
			$conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME_PELI);
			if ($conn->connect_error) {
				die("Fallo de conexion con la base de datos: " . $conn->connect_error);
			}
			else{
				$conn->set_charset("utf8");
				$sql = "SELECT * FROM pelicula WHERE id = '$id'";
				$result = $conn->query($sql)
					   or die ($conn->error. " en la línea ".(LINE-1));

				if($result->num_rows > 0){
					$fila = $result->fetch_assoc();
					echo "<h2>".$fila["nombre"]."<h2>";
					echo '<img class = "img_peli" src="'.$fila["imagen"].'">';
					echo "<p> Año: ".$fila["anyo"]."<p>";
					echo "<p> Duración: ".$fila["duracion"]." min <p>";
					echo "<p> Director: ".$fila["director"]."<p>";
					echo "<p> Reparto: ".$fila["reparto"]."<p>";
					echo "<p> Productora: ".$fila["productora"]."<p>";
					echo "<p> Genero: ".$fila["genero"]."<p>";
					echo "<p> Sinopsis: ".$fila["sinopsis"]."<p>";
				}
			}
		$conn -> close();
		?>
	</div>
</form>	
<div class = "formulario">
		<div class = "contenedor">
		<h2> Comentarios </h2>
		<?php
			$id = $_GET["id"];
			$conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME_PELI);
			if ($conn->connect_error) {
				die("Fallo de conexion con la base de datos: " . $conn->connect_error);
			}
			else{
				$conn->set_charset("utf8");
				$sql = "SELECT * FROM comentarios WHERE id_pelicula = '$id'";
				$result = $conn->query($sql)
					   or die ($conn->error. " en la línea ".(LINE-1));

				if($result->num_rows > 0){
					while($fila = $result->fetch_assoc()){
						echo "<h3>".$fila["titulo"]." por: ".$fila["usuario"]." fecha: ".$fila["Fecha"]."<h3>";
						echo "<p>".$fila["texto"]."<p>";
					}
				}
			}
		$conn -> close();
		?>
		</div>
</div>

 </body>
 <?php	
	include('includes/common/pie.php');
?>
 </html>