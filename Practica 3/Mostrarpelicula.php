<!DOCTYPE html>
<html>
<?php 
include_once('includes/config.php');
include_once('includes/Pelicula.php');
include_once('includes/Comentarios.php');
 ?>
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
			$p = new es\ucm\fdi\aw\Pelicula();
			$p->imprimePelicula($id);
		?>
	</div>
</form>	
<div class = "formulario">
		<div class = "contenedor">
		<h2> Comentarios </h2>
		<?php
			$id = $_GET["id"];
			$c = new es\ucm\fdi\aw\Comentarios();
			$c->imprimeComentarios($id);
		?>
		</div>
</div>

 </body>
 <?php	
	include('includes/common/pie.php');
?>
 </html>