<!DOCTYPE html>
<html>
<?php 
include_once('includes/config.php');
include_once('includes/Comentarios.php');
 ?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/peliculacss.css" />
	<meta charset="utf-8">
	<title>Peliculas</title>
</head>
<body>
	<div class = "textarea">
			<form method="post">
				<p class="msg"> Añade un nuevo comentario: <br/>
				<input type="varchar" name="usuario_com" placeholder="Usuario"> </br>
				<input type="varchar" name="titulo_com" placeholder="Titulo"> </br>
				<textarea name="comentario_com" placeholder="Escriba aqui su comentario" autofocus ></textarea></p>
				<input class="button" onclick="return validaComentario()" type="submit" value="Publicar" style = "margin-top: 5px">
			</form>
	</div>
</body>
<script src="js/validaComentario.js"> </script>
</html>