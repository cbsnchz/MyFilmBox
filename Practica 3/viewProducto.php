<!DOCTYPE html>
<html>
<?php include_once('includes/config.php'); ?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/productocss.css" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta charset="utf-8">
	<title>Producto</title>
</head>

<body>
 <?php
	include('includes/common/cabecera.php');
 ?>

<form class="formulario">	
	<div class ="contenedor">
		<?php
			$id = $_GET["id"];
			$app = es\ucm\fdi\aw\AplicacionProductos::getSingleton();
			$conn = $app->conexionBd();
			$sql = "SELECT * FROM producto WHERE id = '$id'";
			$result = $conn->query($sql)
				or die ($conn->error. "en la línea" .(__LINE__ -1));
	
			if($result->num_rows > 0){
				$fila = $result->fetch_assoc();
				echo "<h2>".$fila["nombre"]."<h2>";
				echo '<img class = "img_producto" src="'.$fila["imagen"].'">';
				$html ='
				<body>
				<table>
					<tr><td><p>Precio: </p></td><td>'.$fila["precio"]. ' € </td></tr>
					<tr><td><p>Descripción: </p></td><td>' .$fila["descripcion"].'</td></tr>
				</table>
				</body>
				';
				echo $html;

				echo '<a href="pago.php?precio='.$fila["precio"].'" button class="button button1">Comprar</a>';
				
				
			}
			
			
		?> 
	</div>
</form>	

 </body>
 <?php	
	include('includes/common/pie.php');
?>
 </html>
