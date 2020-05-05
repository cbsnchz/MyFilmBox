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
		<div class="comments-container">
		<ul id="comments-list" class="comments-list">
		<?php
			$id = $_GET["id"];
			$c = new es\ucm\fdi\aw\Comentarios(null,null,null,null);
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
							<h6 class="comment-name"><a href="http://creaticode.com/blog">'.$value->getUsuario().'</a></h6>
							<span>
							"'.$value->getTitulo().'"</span>
							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
						</div>
						<div class="comment-content">'.$value->getTexto().'</div>
					</div>
				</div>
				</body>
				</html>';
				echo $html;
				/**echo "<h3>".$value->getTitulo()." por: ".$value->getUsuario()." fecha: ".$value->getFecha()."<h3>";
				echo "<p>".$value->getTexto()."<p>";*/
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