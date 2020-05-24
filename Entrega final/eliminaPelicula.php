<!DOCTYPE html>
<?php
    require_once __DIR__.'/includes/config.php';
    if(!isset($_SESSION['esAdmin']) || !$_SESSION['esAdmin'] ){
        echo "No tienes permisos para acceder a esta página";
        exit;
    }
    
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Cambiar rol</title>
	</head>

	<body>
		<div class="contenedor">
      <?php require("includes/common/cabecera.php");?>

			<div id="contenido">
				<?php

					if (es\ucm\fdi\aw\Pelicula::eliminaPelicula($_REQUEST["id"])){
                        es\ucm\fdi\aw\Pelicula::imprimeTablaPeliculas();
                    }
                    else{
                        echo "No se pudo eliminar la pelicula.";
                    }



				?>
			</div>
      <?php require("includes/common/pie.php");?>
		</div>
	</body>
</html>
