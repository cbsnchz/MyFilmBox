<!DOCTYPE html>
<html>
<?php include_once('includes/config.php'); ?>
<head>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<meta charset="utf-8">
	<title>Portada</title>
</head>

<body>

<div id="contenedor">
	<?php
		include('includes/common/cabecera.php');				
	?>
	
	<div id="contenido">
		<?php
		$conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME_PELI);
		if ($conn->connect_error) {
           die("Fallo de conexion con la base de datos: " . $conn->connect_error);
        }
		else{
            $conn->set_charset("utf8");
			$sql = "SELECT id, nombre FROM pelicula";
			$result = $conn->query($sql)
				   or die ($conn->error. " en la línea ".(LINE-1));

			if($result->num_rows > 0){
				while($fila = $result->fetch_assoc()){
					echo "<a href=\"pelicula.php?id=".$fila["id"]."\">".$fila["nombre"]."</a>";
					echo "<br>";
					
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