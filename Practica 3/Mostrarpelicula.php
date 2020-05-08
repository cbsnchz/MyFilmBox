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
			$app = es\ucm\fdi\aw\AplicacionPeliculas::getSingleton();
			$conn = $app->conexionBd();
			$sql = "SELECT * FROM pelicula WHERE id = '$id'";
			$result = $conn->query($sql)
			   or die ($conn->error. " en la línea ".(__LINE__-1));

		if($result->num_rows > 0){
			$fila = $result->fetch_assoc();
			echo "<h2>".$fila["nombre"]."<h2>";
			echo '<img class = "img_peli" src="'.$fila["imagen"].'">';
			$html ='
			<body>
			<table>
				<tr><td><p>Año</p></td><td>'.$fila["anyo"].'</td></tr>
				<tr><td><p>Duración</p></td><td>'.$fila["duracion"].'</td></tr>
				<tr><td><p>Director</p></td><td>'.$fila["director"].'</td></tr>
				<tr><td><p>Reparto</p></td><td>'.$fila["reparto"].'</td></tr>
				<tr><td><p>Productora</p></td><td>'.$fila["productora"].'</td></tr>
				<tr><td><p>Genero</p></td><td>'.$fila["genero"].'</td></tr>
				<tr><td><p>Sinopsis</p></td><td>'.$fila["sinopsis"].'</td></tr>
			</table>
			</body>
			';
			echo $html;
		}
		?>
	</div>
</form>	
<div class = "formulario">
		<div class = "contenedor">
		<h2> Comentarios </h2>
		
		<?php 
			$form = new es\ucm\fdi\aw\FormularioRegistroComentarios($id = $_GET["id"]); $form->gestiona();
		?>
		
		<div class="comments-container">
		<ul id="comments-list" class="comments-list">
		<?php
			$c = new es\ucm\fdi\aw\Comentarios(null,null,null,null,null);
			$comentarios = $c->imprimeComentarios($id);
			foreach ($comentarios as &$value) {
				$html = '
				<html>
				<head>
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
                            <link rel="stylesheet" type="text/css" href="css/comentarioscss.css" />
                            <meta charset="utf-8">
                            <title>Comentarios</title>
                        </head>
				<body>
					<li>
						<div class="comment-main-level">
							<div class="comment-avatar"><img src="img/img_avatar.png" alt=""></div>
							<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name"><a href="http://creaticode.com/blog">'.$value->usuario().'</a></h6>
							<span>
							"'.$value->titulo().'"</span>
							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
							<fecha>
							'.$value->fecha().'
							</fecha>
						</div>
						<div class="comment-content">'.$value->texto().'</div>
					</div>
				</div>
				</body>
				</html>';
				echo $html;
				
			}
    
		?>
		</ul>
		</div>
		</div>
</div>

 </body>
 <?php	
	include('includes/common/pie.php');
?>
 </html>